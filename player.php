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
         <td>1</td>
         <td>Tiger</td>
         <td>Woods</td>
         <td>46</td>
         <td>American</td>
         <td>80kg</td>
         <td>1.85m</td>
      </tr>
      <tr>
         <td>2</td>
         <td>Justin</td>
         <td>Thomas</td>
         <td>33</td>
         <td>American</td>
         <td>78kg</td>
         <td>1.8m</td>
      </tr>
   </table> 
   <br><br><br><br><br><br><br><br><br><br><br><br>
   </div>

   <div id="playerContainer">
   <div id="deletePlayer" class="controls">
   <button class="playerButton" type="button" id="deleteButton">Delete Player</button><br>
   <input type="text" placeholder="Player ID" name="name" id="id_input"/><br>
   </div>
   <div id="addPlayer" class="controls">
   <button class="playerButton" type="button" id="add">Add Player</button>
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
   <button class="playerButton" type="button" id="changeButton">Change Attribute Value</button><br>
   <button class="playerButton" type="button" id="min">Minimum Score</button>
   <button class="playerButton" type="button" id="max">Maximum Score</button>
   <!-- <input type="radio" name="update_option" value="Weight" id="weight_option" checked> Weight<br>
   <input type="radio" name="update_option" value="Height" id="age_option"> Height<br> -->
   <input type="text" placeholder="Value" name="name" id="update_value"/><br>
   </div>
   </div>

   <script src="JS/player.js"></script>
   <?php include_once 'footer.php' ?>

</body>

</html>