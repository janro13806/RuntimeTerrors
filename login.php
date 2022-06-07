<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="style.css" />
   <link rel="stylesheet" href="player.css" />
   <title>Log In</title>
</head>

<body>
  
<?php include_once 'header.php'; ?>
   <div id="login">
   <div id="MainHeading">
      <h1 style="text-align:center">Log In</h1>
   </div>
   <br><br><br>
   <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" id="email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="loginbtn" name="Submit" onclick = "submit()" >Log In</button>
    </div>
   <br><br><br><br><br><br><br><br><br><br><br><br>
   <div id="loginResult">
      <p id="loginMsg"></p>
      
   </div>
   </div>
   

   <script src="JS/login.js"></script>
   <?php include_once 'footer.php' ?>

</body>

</html>