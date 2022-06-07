<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="player.css" />
</head>
    <body>
    <?php include 'header.php';?>
    <div id="MainHeading">
      <h1 style="text-align:center">Statistics</h1>
   </div>
   <br><br><br>
   <div id="main">
   <table >
      <thead>
         <tr>
            <th>ID</th>
            <th>Tournament</th>
            <th>Round</th>
            <th>Score</th>
            <th>Pars</th>
            <th>Birdies</th>
            <th>Bogeys</th>
         </tr>
      </thead>
      
      <tbody id = "dataTable">
         <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
         </tr>
         <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
         </tr>
      </tbody>
      
   </table> 
   <br><br><br><br><br><br><br><br><br><br><br><br>

   <div class="controls">
      <h3 id="top3Msg"></h3>
      <ul id="top3players">
         
      </ul>
      <input type="text" placeholder="Year" id="year_input"/><br>
      <button class="playerButton" type="button" id="top3" onclick="top3()">Top 3 Players</button>
      <button class="playerButton" type="button" id="round_avg" onclick="roundAverage()">Round Average</button>
      <button class="playerButton" type="button" id="first_last_dist" onclick="firstLastDist()">First 9 & Last 9 distances</button>
   </div>

   <!-- Buttons -->
   <!-- Top 3 players -->
   <!-- Average Score per round - returns all rounds but grouped and average added-->
   <!-- First 9 & Last 9 distance -->

   </div>
    <div id="footer">
				<?php include 'footer.php';?>

	</div>

   <script src="JS/statistic.js"></script>
    </body>
</html>