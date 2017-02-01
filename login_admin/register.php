<html>
<head>
	<title>User registration</title>
</head>
<body>
<h1>User registration form</h1>
<?php
require_once("/var/www/html/books/pdo_test/db2.php");
if (!isset($_POST['submit'])) {
?>	<!-- The HTML registration form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Username: <input type="text" name="username" /><br />
		Password: <input type="password" name="password" /><br />
		First name: <input type="text" name="first_name" /><br />
		Last name: <input type="text" name="last_name" /><br />
		Email: <input type="type" name="email" /><br />

		<input type="submit" name="submit" value="Register" />
	</form>
<?php
} else {
## connect mysql server
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($dbh->connect_errno) {
		echo "<p>MySQL error no {$dbh->connect_errno} : {$dbh->connect_error}</p>";
		exit();
	}
## query database
	# prepare data for insertion
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$first_name	= $_POST['first_name'];
	$last_name	= $_POST['last_name'];
	$email		= $_POST['email'];

	# check if username and email exist else insert
	$exists = 0;
	$result = $dbh->query("SELECT username from login WHERE username = '{$username}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists = 1;
		$result = $dbh->query("SELECT email from login WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 2;
	} else {
		$result = $dbh->query("SELECT email from login WHERE email = '{$email}' LIMIT 1");
		if ($result->num_rows == 1) $exists = 3;
	}

	if ($exists == 1) echo "<p>Username already exists!</p>";
	else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
	else if ($exists == 3) echo "<p>Email already exists!</p>";





	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `login` (`id`, `username`, `password`, `first_name`, `last_name`, `email`)
				VALUES (NULL, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}')";

		if ($dbh->query($sql)) {
			//echo "New Record has id ".$mysqli->insert_id;
			echo "<p>Registred successfully!</p>";
		} else {
			echo "<p>MySQL error no {$dbh->errno} : {$dbh->error}</p>";
			exit();
		}
	}
}
?>
</body>
</html>