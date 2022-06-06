<?php
    include_once('config.php');
    session_start();

//================================================================================
// CREATE RESPONSE FUNCTION.
//================================================================================
function response($success, $message = "") 
{   header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");

    $assocArray = array("success" => $success, "message" => $message);

    echo json_encode($assocArray);
}


//================================================================================
//================================================================================
    class API_Class{
        private $type;
        private $userName;
        private $password;

        //Methods
        public static function instance() {
            static $instance = null;  //remember this only ever gets called once
            if ($instance === null) {$instance = new API_Class();}
            return $instance;       
        }

        public function processRequest(){
            //if the request is JSON data e.g. {'username' : 'JanroB'}
            $this->json = file_get_contents('php://input');
            $this->user = json_decode($this->json, true); //Converts it into a PHP object
            header('Content-Type: application/json');
        }

        public function login($name, $pass){
            if (!empty($name) && !empty($pass) && !is_numeric($name)) {
                //read from database..

                $query = "SELECT * FROM users WHERE userName = '$name' AND userPassword = '$pass' limit 1";
                $result = mysqli_query($con, $query); 
                
                
                //IF the user was found in the table.
                if ($result && mysqli_num_rows($result) > 0) {
                    //Fetch the data from the found user
                    $user_data = mysqli_fetch_assoc($result);
                    $_SESSION['userName'] = $user_data['userName'];
                    response("Success!!!", $_SESSION['userName']);
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
            if ( $this->type == 'login'){
                $this->userName = ($this->user['userName']);
                $this->password = ($this->user['password']); 
                login($this->userName, $this->password);
            }  
        }
    }

//================================================================================
//================================================================================   
    //Create API Singleton instance.

    $MY_AP1 = API_Class::instance();

?>