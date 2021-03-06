<?php 
//This is the functions file.

//connect to db
include_once "config.php";


//get the players of the tournament
function getPlayer() {
    $con = connect();
    $query = "SELECT * FROM player pl
            JOIN person p ON p.person_id = pl.person_id";
    $queryresult = $con->query($query);

    //Code to build assoc array
    $index = 0;
    $assocArr = [];
    
    while($row = $queryresult->fetch_assoc()){
       $assocArr[$index++] = array(
        "Player_ID" => $row["player_id"], 
        "Name" => $row["name"],
        "Surname" => $row["surname"], 
        "Nationality" => $row["nationality"], 
        "Weight" => $row["weight"], 
        "Height" => $row["height"], 
        "Age" => $row["age"], 
        "Rank" => $row["rank"]); 
    }
    
    return $assocArr;
}

//get the course
function getCourse(){
    $con = connect();
    $query = "
    SELECT *
    FROM course";
    $queryresult = $con->query($query);
    
    //Code to build assoc array
    $index = 0;
    $assocArr = [];
    while($row = $queryresult->fetch_assoc())
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
    $con = connect();
    $query = "
    SELECT *
    FROM hole";
    $queryresult = $con->query($query);

     //Code to build assoc array
     $index = 0;
     $assocArr = [];
     while($row = $queryresult->fetch_assoc())
     {
         $assocArr[$index++] = array(
             "Hole_nr" => $row["hole_nr"],
             "Distance" => $row["distance"],
             "Par" => $row["par"],
             "Num_Bunkers" => $row["num_bunkers"],
             "Name" => $row["hole_name"],
             "Course_id" => $row["course_id"]
         );
     }
 
     return $assocArr;
}

//get the rounds 
function getRounds(){
    $con = connect();
    $query = "
    SELECT *
    FROM round";
    $queryresult = $con->query($query);
    
         //Code to build assoc array
         $index = 0;
         $assocArr = [];
         while($row = $queryresult->fetch_assoc())
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
    $con = connect();
    $query = "
    SELECT *
    FROM statistic";
    $queryresult = $con->query($query);

    $index = 0;
    $assocArr = [];
    while($row = $queryresult->fetch_assoc())
    {
        $assocArr[$index++] = array(
            "Statistic_Id" => $row["statistic_id"],
            "Tournament_Id" => $row["tournament_id"],
            "Round_Nr" => $row["round_nr"],
            "Score" => $row["score"],
            "Pars" => $row["pars"],
            "Birdies" => $row["birdies"],
            "Bogeys" => $row["bogeys"],
        );
    }
    return $assocArr;
}

//get the tournament
function getTournaments(){
    $con = connect();
    $query = "
    SELECT *
    FROM tournament";
    $queryresult = $con->query($query);

    $index = 0;
    $assocArr = [];
    while($row = $queryresult->fetch_assoc())
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
    $con = connect();
    $query = "
    DELETE FROM player
    WHERE player_id='$playerid'";
    
    if ($con->query($query)) {
        return getPlayer();
    }
    else {
        return false;
    }
}

function updatePlayerWeight($player_id,$weight){
    $con = connect();
    $query = "
    UPDATE person
    SET weight='$weight'
    WHERE person_id = ( 
        SELECT person_id
        FROM player
        WHERE player_id='$player_id')";

    if ($con->query($query)) {
        return getPlayer();
    }
    else {
        return false;
    }
}

function updatePlayerAge($player_id,$age){
    $con = connect();
    $query = "
    UPDATE person
    SET age='$age'
    WHERE person_id = ( 
        SELECT person_id
        FROM player
        WHERE player_id='$player_id')";

    if ($con->query($query)) {
        return getPlayer();
    }
    else {
        return false;
    }
}

function updateCourse($length,$course_id){
    $con = connect();
    $query = "
    UPDATE course
    SET length='$length'
    WHERE course_id='$course_id'";

    if ($con->query($query)) {
        return getCourse();
    }
    else {
        return false;
    }
}

function deleteCourse($course_id){
    $con = connect();
    $query = "
    DELETE FROM course
    WHERE course_id='$course_id'";

    if ($con->query($query)) {
        return getCourse();
    }
    else {
        return false;
    }
}

function addScore($player_id, $tournament_id, $round_nr, $score, $pars, $birdies, $bogeys){
    $con = connect();
    $getStatIdQuery = "SELECT statistic_id FROM statistic ORDER BY statistic_id DESC LIMIT 1";
    $getStatIdResult = $con->query($getStatIdQuery);
    
    $row = $getStatIdResult->fetch_assoc();
    $newStatId = $row["statistic_id"] + 1;

    $query1 = "INSERT INTO round VALUES('$round_nr', '$player_id', '$tournament_id', '$score');";
    $query2 = "INSERT INTO statistic VALUES('$newStatId', '$tournament_id', '$round_nr', '$score', '$pars', '$birdies', '$bogeys');";
    $query3 = "INSERT INTO round_statistic VALUES('$player_id', '$newStatId', '$round_nr');";

    if($con->query($query1) && $con->query($query2) && $con->query($query3)){
        return getRounds();
    }else{
        return false;
    }
}


function countPlayers(){
    $con = connect();
    $query = "
    SELECT COUNT(player_id)
    AS PlayerCount
    FROM player";

    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();
    return $row['PlayerCount'];
}


function minScore(){
    $con = connect();
    $query = "
    SELECT MIN(Score)
    AS LowestScore
    FROM round";
      
    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();
    return $row['LowestScore'];
}

function maxScore(){
    $con = connect();
    $query = "
    SELECT MAX(Score)
    AS HighestScore
    FROM round";
      
    $queryresult = $con->query($query);
    $row = $queryresult->fetch_assoc();
    return $row['HighestScore'];
}

function AddPlayer($name,$surname,$rank,$nationality,$weight,$height,$age) {
    $con = connect();
    $getpersonidQuery = "SELECT person_id FROM person ORDER BY person_id DESC LIMIT 1";
    $getpersonIdresult = $con->query($getpersonidQuery);
    
    $row = $getpersonIdresult->fetch_assoc();
    $newpersonid = $row["person_id"] + 1;

    $getplayeridQuery = "SELECT player_id FROM player ORDER BY player_id DESC LIMIT 1";
    $getplayerIdresult = $con->query($getplayeridQuery);
    
    $row = $getplayerIdresult->fetch_assoc();
    $newplayerid = $row["player_id"] + 1;

    $query1 = "INSERT INTO person VALUES('$newpersonid','$name','$surname',
    '$nationality','$weight','$height','$age')";
    $query2= "INSERT INTO player VALUES('$newplayerid','$newpersonid','$rank')";

    if($con->query($query1) && $con->query($query2)){
        return getPlayer();
    }else{
        return false;
    }
}

function topthree($year) {
    $con = connect();

    //SELECT player_id, SUM(score) AS Total_Score FROM runtimeterrors_golf.round 
    //WHERE tournament_id=2020 GROUP BY player_id ORDER BY Total_Score;
    $index = 0; 
    $query = "
    SELECT player_id, SUM(score) AS Total_Score 
    FROM round 
    WHERE tournament_id='$year' GROUP BY player_id ORDER BY Total_Score
    ";
     
    $queryresult = $con->query($query);
    for ($i=0; $i < 3 ; $i++) { 
        $row = $queryresult->fetch_assoc();

        $assocArr[$index++] = array('player_id' => $row['player_id'], 
        'Total_Score' => $row['Total_Score']);
    }

    return $assocArr;
    
}

function avgScore() {
    $con = connect();
    
    $index = 0;
    $assocArr = array();  

    for ($k=2022; $k >= 2018; $k--) { 
        for ($i=1; $i <= 4; $i++) { 
            $avgQuery = "SELECT AVG(score)
            AS AverageScore
            FROM round WHERE
            round_nr = '$i' AND tournament_id = '$k' ";

            $result = $con->query($avgQuery);
            $row = $result->fetch_assoc();
            
            $assocArr[$index++] = array('AverageScore' => $row['AverageScore'], 'Year' => $k, 'Round' => $i);        
        }
    }

    return $assocArr;
}

function FrontBackDistances(){
    $con = connect();
    
    $getDistQuery = "SELECT distance FROM hole";
    $queryresult = $con->query($getDistQuery);
    
    $index = 1;
    $firstNine = 0;
    for($i = 0; $i < 9; $i++)
    {
        $row = $queryresult->fetch_assoc();
        $firstNine += $row['distance'];
        $index++;
    }

    $backNine = 0;
    for($i = 0; $i < 9; $i++)
    {
        $row = $queryresult->fetch_assoc();
        $backNine += $row['distance'];
        $index++;
    }
    
    $assocArr = array(
        "Front_Nine" => $firstNine,
        "Back_Nine" => $backNine
    );

    return $assocArr;
}

?>