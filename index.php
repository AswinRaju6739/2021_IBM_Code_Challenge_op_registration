<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>
  <style type="text/css">

  #button{

    padding: 15px;
    width: 150px;
    color: black;
    background-color: lightgrey;
    border: blue;
    box-shadow: 3px 5px;
  }

  #box{

    background-color: lightblue;
    margin: auto;
    width: 500px;
    padding: 30px;
  }

  </style>

  <div id="box">
  <a href="logout.php">Logout</a>

	<h1>USER INFORMATION</h1>

	<br>
	Name - <?php echo $user_data['user_name']; ?>
  <br>
  Age - <?php echo $user_data['age']; ?>
  <br>
  District - <?php echo $user_data['district']; ?>
  <br>
  Phone number - <?php echo $user_data['phone_number']; ?>
  <br><br>

  <form method="POST" action="appointment.php">
	  <input id = "button" type="submit" value="New appointment"/>
	</form>
  <br>
	<form method="POST" action="viewappointment.php">
	  <input id = "button" type="submit" value="View appointment"/>
	</form>
  </div>
  
</body>
</html>