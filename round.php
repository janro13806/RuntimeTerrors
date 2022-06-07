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
      <h1 style="text-align:center">Rounds</h1>
   </div>
   <br><br><br>
   <div id="main">
   <table >
      <thead>
         <tr>
            <th>Player ID</th>
            <th>Tournament</th>
            <th>Round Nr</th>
            <th>Score</th>
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
   </div>
   
   <div class="controls">
   <button class="playerButton" type="button" id="add">Add Score</button>
   <form action="">
         <input type="text" placeholder="Round Number" id="round_nr"/><br>
         <input type="text" placeholder="Player ID" id="player_id"/><br>
         <input type="text" placeholder="Tournament ID" id="tournament_id"/><br>
         <input type="text" placeholder="Score" id="score"/><br>
         <input type="text" placeholder="Pars" id="pars"/><br>
         <input type="text" placeholder="Birdies" id="birdies"> <br>
         <input type="text" placeholder="Bogeys" id="bogeys"> <br><br>
         <!-- <input type="submit" value="Submit"> -->
      </form>

      <div id="statistics">
         <p id="statMsg"></p>
         
         
         <button class="playerButton" type="button" id="min" onclick="min()">Minimum Score</button>
         <!-- <input type="radio" name="statOption" id="stat_option" value="Minimum" checked>
         <label for="">Minimum Score</label> <br> -->

         <button class="playerButton" type="button" id="max" onclick="max()">Maximum Score</button>
         <!-- <input type="radio" name="statOption" id="stat_option" value="Maximum" checked>
         <label for="">Maximum Score</label> <br> -->

         <!-- <button id="stat">Show Result</button> -->
      </div>
   </div>
    <div id="footer">
				<?php include 'footer.php';?>

	</div>

   <script src="JS/round.js"></script>

    </body>
</html>