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
      <h1 style="text-align:center">Tournament</h1>
   </div>
   <br><br><br>
   <div id="main">
   <table>

      <thead>
         <tr>
            <th>Year</th>
            <th>Win Score</th>
            <th>Winner</th>
            <th>Course</th>
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
    <div id="footer">
				<?php include 'footer.php';?>

	</div>
   <script src="JS/tournament.js"></script>
    </body>
</html>