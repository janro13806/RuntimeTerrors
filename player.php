<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="style.css" />
   <link rel="stylesheet" href="player.css" />
   <title>Players</title>
</head>

<body>
  
<?php include_once 'header.php'; ?>

   <div id="MainHeading">
      <h1 style="text-align:center">Players</h1>
   </div>
   <br><br><br>
   <div id="main">
   <table id = "dataTable">
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Surname</th>
         <th>Age</th>
         <th>Nationality</th>
         <th>Weight</th>
         <th>Height</th>

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

   <div id="playerContainer">
   <div id="deletePlayer" class="controls">
   <button class="playerButton" type="button">Delete Player</button>
   <input type="text" placeholder="Player ID" name="name"/><br>
   </div>
   <div id="addPlayer" class="controls">
   <button class="playerButton" type="button">Add Player</button>
   <form action="">
         <input type="text" placeholder="First Name" name="name"/><br>
         <input type="text" placeholder="Surname" name="name"/><br>
         <input type="text" placeholder="Ranking" name="name"/><br>
         <input type="text" placeholder="Nationality" name="name"/><br>
         <input type="text" placeholder="Weight" name="name"/><br>
         <input type="text" placeholder="Height" name="password"> <br><br>
         <input type="submit" value="Submit">
      </form>
   </div>
   <div id="changePlayer" class="controls">
   <button class="playerButton" type="button">Change Attribute Value</button>
   <input type="radio" name="gender" value="Weight"> Weight<br>
   <input type="radio" name="gender" value="Height"> Height<br>
   <input type="text" placeholder="Value" name="name"/><br>
   </div>
   </div>

   <script src="JS/player.js"/></script>
   <?php include_once 'footer.php' ?>

</body>

</html>