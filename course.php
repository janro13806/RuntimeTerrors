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
      <h1 style="text-align:center">Course</h1>
   </div>
   <br><br><br>
   <div id="main">
   <table >
      <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Town</th>
            <th>City</th>
            <th>Length</th>
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
      <input type="text" placeholder="Course ID" id="cid_input"/><br>
      <input type="text" placeholder="Length" id="length_input"/><br>
      <button class="playerButton" type="button" id="delete_course" onclick="deleteCourse()">Delete course</button>
      <button class="playerButton" type="button" id="update_course" onclick="updateCourse()">Update course</button>
      
   </div>
    
   <div id="footer">
				<?php include 'footer.php';?>

	</div>

   <script src="JS/course.js"></script>
    </body>
</html>