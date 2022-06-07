<?php
    include_once('config.php');
    include_once('functions.php');
    session_start();

//================================================================================
// CREATE RESPONSE FUNCTION.
//================================================================================
function response($success, $type, $message = "") 
{   header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");

    $assocArray = array("success" => $success,"type" => $type ,"message" => $message);

    echo json_encode($assocArray);
}


//================================================================================
//================================================================================
    class API_Class{
        private $type;
        private $userName;
        private $password;
        private $requestData;

        //Methods
        public static function instance() {
            static $instance = null;  //remember this only ever gets called once
            if ($instance === null) {$instance = new API_Class();}
            return $instance;       
        }

        public function processRequest(){
            //if the request is JSON data e.g. {'username' : 'JanroB'}
            $this->json = file_get_contents('php://input');
            $this->requestData = json_decode($this->json, true); //Converts it into a PHP object
            header('Content-Type: application/json');
        }

        public function login($name, $pass){
            if (!empty($name) && !empty($pass) && !is_numeric($name)) {
                $con = connect();
                //read from database..

                $query = "SELECT * FROM users WHERE userName = '$name' AND userPassword = '$pass' limit 1";
                $result = mysqli_query($con, $query); 
                
                
                //IF the user was found in the table.
                if ($result && mysqli_num_rows($result) > 0) {
                    //Fetch the data from the found user
                    $user_data = mysqli_fetch_assoc($result);
                    $_SESSION['userName'] = $user_data['userName'];
                    response("Success!!!", $this->type ,$_SESSION['userName']);
                    die();
                }
                header('Location: login.php?login=userNotFound');
                error_log("INVALID : User was not found.");
                exit();
            } else {
                header('Location: login.php?login=EmptyError');
                error_log("INVALID : login credentials are not specified.");
                exit();
            }              
        }

        public function __construct() {
            $this->processRequest();
            $this->type = $this->requestData['type'];

            if ($this->type == 'login'){
                $this->userName = ($this->requestData['userName']);
                $this->password = ($this->requestData['password']); 
                $this->login($this->userName, $this->password);
            } 
            else if ( $this->type == 'dPlayer') {
                $this->player_id = $this->requestData['player_id'];
                $newPlayArr = deletePlayer($this->player_id);
                response("Success!!!", $this->type, $newPlayArr);
            } 
            else if ($this->type == 'uPlayer') {
                $this->player_id = $this->requestData['player_id'];
                if ($this->requestData['age']){
                    $this->age = ($this->requestData['age']);
                    $newPlayArr = updatePlayerAge($this->player_id, $this->age);
                    response("Success!!!", $this->type, $newPlayArr);
                }
                if ($this->requestData['weight']){
                    $this->weight = ($this->requestData['weight']);
                    $newPlayArr = updatePlayerWeight($this->player_id, $this->weight);
                    response("Success!!!", $this->type, $newPlayArr);
                }
            }
            else if ($this->type == 'uCourse') {
                $this->length = $this->requestData['length'];
                $this->course_id = $this->requestData['course_id'];

                $newCourseArr = updateCourse($this->length, $this->course_id);
                response("Success!!!", $this->type, $newCourseArr);
            }
            else if ($this->type == 'dCourse') {
                $this->course_id = $this->requestData['course_id'];

                $newCourseArr = deleteCourse($this->course_id);
                response("Success!!!", $this->type, $newCourseArr);
            }
            else if ($this->type == 'aScore') {
                $this->player_id = $this->requestData['player_id'];
                $this->tournament_id = $this->requestData['tournament_id'];
                $this->round_nr = $this->requestData['round_nr'];
                $this->score = $this->requestData['score'];
                $this->pars = $this->requestData['pars'];
                $this->birdies = $this->requestData['birdies'];
                $this->bogeys = $this->requestData['bogeys'];

                $newScoreArr = addScore($this->player_id, $this->tournament_id, $this->round_nr, $this->score, $this->pars, $this->birdies, $this->bogeys);
                response("Success!!!", $this->type, $newScoreArr);     
            }
            else if ($this->type == 'cPlayers') {
                $numPlayers = countPlayers();
                response("Success!!!", $this->type, $numPlayers);
            }
            else if ($this->type == 'minScore') {
                $minScore = minScore(); 
                response("Success!!!", $this->type, $minScore);
            }
            else if ($this->type == 'maxScore') {
                $maxScore = maxScore(); 
                response("Success!!!", $this->type, $maxScore);    
            }
            else if ($this->type == 'gPlayer') {
                $PlayersArr = getPlayer();
                response("Success!!!", $this->type, $PlayersArr);
            }
            else if ($this->type == 'gCourse') {
                $CourseArr = getCourse();
                response("Success!!!", $this->type, $CourseArr);
            }
            else if ($this->type == 'gHoles') {
                $HolesArr = getHoles();
                response("Success!!!", $this->type, $HolesArr); 
            }
            else if ($this->type == 'gRounds') {
                $RoundsArr = getRounds();
                response("Success!!!", $this->type, $RoundsArr);   
            }
            else if ($this->type == 'gStatistics') {
                $StatisticsArr = getStatistics();
                response("Success!!!", $this->type, $StatisticsArr);
            }
            else if ($this->type == 'gTournaments') {
                $TournamentsArr = getTournaments();
                response("Success!!!", $this->type, $TournamentsArr);
            }
        }
    }

//================================================================================
//================================================================================   
    //Create API Singleton instance.

    $MY_AP1 = API_Class::instance();

?>