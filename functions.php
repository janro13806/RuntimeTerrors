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

//this function needs to be checked.
function getPlayerStat(){
    $query = "
    SELECT p.name,p.surname,s.round,s.score,s.pars,s.birdies,s.bogeys 
    FROM statistic s,person p,round_statistic r,player pl
    WHERE (r.statistic_id = s.statistic_id AND r.playerid=pl.playerid) ";
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
function getHole(){
    $query = "
    SELECT t.hole_nr,t.distance,t.par,t.num_bunkers,t.stroke_difficulty
    FROM tournament t,course c
    WHERE t.course_id=c.course_id";
    $queryresult = $con->query($query);
}

?>