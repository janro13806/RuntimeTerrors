<?php 
//This is the functions file.

//connect to db
include "config.php";

//get the players of the tournament
function getPlayer() {
    $query = "
    SELECT p.person_id AS Person_id ,p.name AS Name,p.surname AS Surname,
    pl.player_id AS Player_ID,p.nationality AS Nationality,
    p.weight AS Weight,p.height AS Height,
    p.age AS Age,pl.rank AS Rank
    FROM person p, player pl";
    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();

    //Code to build assoc array
    $index = 0;
    $assocArr = [];
    while($row = fetch_assoc($queryresult)){
       $assocArr[$index++] = array("Person_id" => $row["Person_id"],"Name" => $row["Name"]  
    ,"Surname" => $row["Surname"], "Player_ID" => $row["Player_ID"], 
    "Nationality" => $row["Nationality"], "Weight" => $row["Weight"], 
    "Height" => $row["Height"], "Age" => $row["Age"], "Rank" => $row["Rank"]); 
    }
    
    return $assocArr;
}

//get the course
function getCourse(){
    $query = "
    SELECT *
    FROM course";
    $queryresult = $con->query($query);
    
    //Code to build assoc array
    $index = 0;
    $assocArr = [];
    while($row = fetch_assoc($queryresult))
    {
        $assocArr[$index++] = array(
            "Course_Id" => $row["course_id"],
            "Name" => $row["name"],
            "Town" => $row["town"],
            "City" => $row["city"],
            "Length" => $row["length"]
        );
    }

    return $assocArr;
}

//get the holes of the course
function getHoles(){
    $query = "
    SELECT *
    FROM hole";
    $queryresult = $con->query($query);

     //Code to build assoc array
     $index = 0;
     $assocArr = [];
     while($row = fetch_assoc($queryresult))
     {
         $assocArr[$index++] = array(
             "Hole_nr" => $row["hole_nr"],
             "Distance" => $row["distance"],
             "Par" => $row["par"],
             "Num_Bunkers" => $row["num_bunkers"],
             "Stroke_Difficulty" => $row["stroke_difficulty"]
             "Course_id" => $row["course_id"]
         );
     }
 
     return $assocArr;
}

//get the rounds 
function getRounds(){
    $query = "
    SELECT *
    FROM round";
    $queryresult = $con->query($query);
    
         //Code to build assoc array
         $index = 0;
         $assocArr = [];
         while($row = fetch_assoc($queryresult))
         {
             $assocArr[$index++] = array(
                "Tournament_id" => $row["tournament_id"],
                "Player_id" => $row["player_id"],
                "Round_nr" => $row["round_nr"],
                "Score" => $row["score"],
             );
         }
         return $assocArr;
} 

//get statistics table
function getStatistics(){
    $query = "
    SELECT *
    FROM statistic";
    $queryresult = $con->query($query);

    $index = 0;
    $assocArr = [];
    while($row = fetch_assoc($queryresult))
    {
        $assocArr[$index++] = array(
            "Statistic_Id" => $row["statistic_id"],
            "Tournament_Id" => $row["tournament_id"],
            "Round_Nr" => $row["round_nr"],
            "Score" => $row["score"],
            "Pars" => $row["Pars"],
            "Birdies" => $row["birdies"],
            "Bogeys" => $row["bogeys"],
        );
    }
    return $assocArr;
}

//get the tournament
function getTournaments(){
    $query = "
    SELECT *
    FROM tournament";
    $queryresult = $con->query($query);

    $index = 0;
    $assocArr = [];
    while($row = fetch_assoc($queryresult))
    {
        $assocArr[$index++] = array(
            "Tournament_Id" => $row["tournament_id"],
            "Winner_Score" => $row["win_score"],
            "Winner" => $row["winner"],
            "Course" => $row["course_id"]
        );
    }

    return $assocArr;
}

//================================================================================
//================================================================================
//================================================================================

function deletePlayer($playerid){
    $query = "
    DELETE FROM player
    WHERE player_id="+$playerid+"";
    
    if ($con->query($query)) {
        return getPlayer();
    }
    else {
        return false;
    }

    
}

function updatePlayerWeight($player_id,$weight){
    $query = "
    UPDATE person
    SET weight="+$weight+"
    WHERE person_id = ( 
        SELECT person_id
        FROM player
        WHERE player_id="+$player_id+")";

    if ($con->query($query)) {
        return getPlayer();
    }
    else {
        return false;
    }
}

function updatePlayerAge($player_id,$age){
    $query = "
    UPDATE person
    SET age="+$age+"
    WHERE person_id = ( 
        SELECT person_id
        FROM player
        WHERE player_id="+$player_id+")";

    if ($con->query($query)) {
        return getPlayer();
    }
    else {
        return false;
    }
}

function updateCourse($length,$course_id){
    $query = "
    UPDATE FROM player
    SET length="+$length+"
    WHERE course_id="+$course_id+"";

    if ($con->query($query)) {
        return getCourse();
    }
    else {
        return false;
    }
}

function deleteCourse($course_id){
    $query = "
    DELETE FROM course
    WHERE course="+$course_id+"";

    if ($con->query($query)) {
        return getCourse();
    }
    else {
        return false;
    }
}

function addScore($player_id, $tournament_id, $round_nr, $score, $pars, $birdies, $bogeys){
    $getStatIdQuery = "SELECT statistic_id FROM statistic ORDER BY statistic_id DESC LIMIT 1";
    $getStatIdResult = $con->($getStatIdQuery);
    
    $row = $getStatIdResult->fetch_assoc();
    $newStatId = $row["statistic_id"] + 1;

    $query = "
        INSERT INTO round VALUES("+ $player_id +", "+ $tournament_id +", "+ $round_nr +", "+ $score +");
        INSERT INTO statistic VALUES("$newStatId" ,"+ $player_id +", "+ $tournament_id +", "+ $round_nr +", "+ $score +", "+ $pars +","+ $birdies +", "+ $bogeys +");
        INSERT INTO round_statistic VALUES("$newStatId","+ $player_id +", "+ $round_nr +");
    ";

    if($con->query($query)){
        return getRounds(); //possibly getStatistics() depending on the display page
    }else{
        return false;
    }
}


function countPlayers(){
    $query = "
    SELECT COUNT(player_id)
    AS PlayerCount
    FROM player";

    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();
    return $row['PlayerCount'];
}


function minScore(){
    $query = "
    SELECT MIN(Score)
    AS LowestScore
    FROM round";
      
    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();
    return $row['LowestScore'];
}

function maxScore(){
    $query = "
    SELECT MAX(Score)
    AS HighestScore
    FROM round";
      
    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();
    return $row['HighestScore'];
}

?>