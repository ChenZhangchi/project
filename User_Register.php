<html>
<head>
<title>Modify Info</title>
</head>
<body>
	<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'mydb');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
	//inserting Record to the database
	$username = $_POST['username'];
	$password = $_POST['initPassword'];
	$enSurePass = $_POST['ensurePassword'];
	$identity = $_POST['identity'];
	$id = $_POST['id'];
	
	if(! $password == $enSurePass){
		echo "Two passwords are not the same, please try again!";
	}//end if: Checking whether the password are equal
	
	//logic 
	$query = "SELECT * FROM account ";
	$resultSet = mysql_query($query);
	$length = mysql_num_rows($resultSet);
	$newAccountID = $length + 1;
	$queryIntoUsers = "INSERT INTO account (Account, Password,identity,id)
		VALUES ('$username','$password','$identity','$id');";
	
	//Check insert successful:
	//Check insert successful:
	$result1 = mysql_query($queryIntoUsers);
	if($result1)
	{
		echo "Successfully register this user in database, you can use log in into database!"; 
		mysql_close($con);
		header("location:RegisteSuccess.html");
	}
	else
	{
		die('Regiter fails: '.mysql_error($con));
		mysql_close($con);
		header("location:UserRegister.html");
	}

		

	?>
</body>
</html>