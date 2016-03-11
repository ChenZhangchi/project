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
	$username = $_POST['userNameInfo'];
	$password = $_POST['passwordInfo'];
	
	$query = "SELECT password FROM account where account= '$username' ";
	$result = mysql_query($query);

	if(mysql_result($result,0)== $password)
	{
	echo "log in " ;
	}
	
	
	?>
</body>
</html>