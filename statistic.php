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
   <table id = "dataTable">
      <tr>
         <th>ID</th>
         <th>Tournament</th>
         <th>Round</th>
         <th>Score</th>
         <th>Pars</th>
         <th>Birdies</th>
         <th>Bogeys</th>

      </tr>
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
   </table> 
   <br><br><br><br><br><br><br><br><br><br><br><br>
   </div>
    <div id="footer">
				<?php include 'footer.php';?>

	</div>

    </body>
</html>