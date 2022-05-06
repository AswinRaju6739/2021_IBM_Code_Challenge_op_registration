<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
    	$age = $_POST['age'];
    	$district = $_POST['district'];
    	$phone_number = $_POST['phone_number'];
		if(!empty($user_name) && !empty($password) && !empty($age) && !empty($district) && !empty($phone_number) )
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,age,district,phone_number) values ('$user_id','$user_name','$password','$age','$district','$phone_number')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">

	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: black;
		border: none;
	}

	#box{

		background-color: lightblue;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Register</div>

      <label for="user_name">Name</label>
			<input id="text" type="text" name="user_name"><br><br>
      <label for="password">Password</label>
			<input id="text" type="password" name="password"><br><br>
      <label for="age">Age</label>
      <input id="text" type="text" name="age"><br><br>
      <label for="district">District</label>
      <input id="text" type="text" name="district"><br><br>
      <label for="phone_number">Phone Number</label>
      <input id="text" type="text" name="phone_number"><br><br>

			<input id="button" type="submit" value="Register"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
