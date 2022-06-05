<?php 
//This is the functions file.

//connect to db
include "config.php";

function getPlayers() {
    $query = "
    SELECT name,surname,nationality,weight,height,age 
    FROM person";
    $queryresult = $con->query($query);
}

//get statistics table
function getPlayersStats(){
    $query = "
    SELECT s.statistic_id,s.tournament,s.roun_nr,s.score,s.pars,s.birdies,s.bogeys 
    FROM statistic s,";
    $queryresult = $con->query($query);
}

//get the tournament
function getTournament(){
    $query = "
    SELECT year,tournament_id,win_score,winner,course_id
    FROM tournament";
    $queryresult = $con->query($query);
}

//get the holes of the course
function getHoles(){
    $query = "
    SELECT t.hole_nr,t.distance,t.par,t.num_bunkers,t.stroke_difficulty
    FROM tournament t,course c
    WHERE t.course_id=c.course_id";
    $queryresult = $con->query($query);
}

function getRounds(){
    $query = "
    SELECT player_id,tournament_id,round_nr,score
    FROM round";
    $queryresult = $con->query($query);
} 

function getCourse(){
    $query = "
    SELECT course_id,name,town,city,length
    FROM course";
    $queryresult = $con->query($query);
}

//this function needs to be checked. It is intended for a spesific player
function getIntendedPlayerStat($playerid){
    $query = "
    SELECT p.name,p.surname,s.round,s.score,s.pars,s.birdies,s.bogeys 
    FROM statistic s,person p,round_statistic r,player pl
    WHERE (r.statistic_id = s.statistic_id AND r."+$playerid+"=pl.playerid) ";
    $queryresult = $con->query($query);
}

//delete a player Important: Player has statistics,rounds etc to be deleted
function removePlayer(){
    $playerid = "";
    $query = "
    DELETE FROM player 
    WHERE playerid="+$playerid+"";
    $queryresult = $con->query($query);
}

//add a person to the table
function addPerson($personid,$name,$surname,$nationality,$weight,$height,$age){
    $query = "
    INSERT INTO person 
    VALUES ("+$personid+","+$name+$surname+","+$nationality+","+$weight+","+$height+","+$age+")";
    $queryresult = $con->query($query);
}




?>