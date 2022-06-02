<?php

    // Nav bar that gets included on all pages
    require_once('config.php');
        echo '
            <div class="web-nav-bar" >
                <ul > 
                    <li style="width: 100px;"><a  id="Home" href="index.php"><i class="fa-solid fa-house"></i> Home<span>Go to the "Home" page</span></a></li>
                    <li><a  href="player.php">Players<span>Go to the "Players" page</span></a></li> 
                    <li><a  href="hole.php">Holes<span>Go to the "Holes" page</span></a></li>
                    <li><a  href="round.php">Rounds<span>Go to the "Rounds" page</span></a></li>
                    <li><a  href="statistic.php">Statistics<span>Go to the "Statistics" page</span></a></li>
                    <li><a  href="tournament.php">Tournaments<span>Go to the "Tournaments" page</span></a></li>
                    <li><a  href="course.php">Course<span>Go to the "Course" page</span></a></li>
                </ul>
            </div>
        ';

?>