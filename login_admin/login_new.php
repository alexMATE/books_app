

<?php
  require_once("/var/www/html/books/pdo_test/db2.php");
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // $username = $_POST['username'];
	// $password = $_POST['password'];

  if(isset($_POST['submit'])) {

    $username = $_POST['username'];
  	$password = $_POST['password'];


    try {
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //$sql = "INSERT INTO login (username, password, first_name, last_name, email) VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."')";
      $sql = "SELECT * from login WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
      $result = $dbh->query($sql);


      if (!$result->rowCount() == 1) {
    		echo "<p>Invalid username/password combination</p>";
    	} else {
    		echo "<p>Logged in successfully</p>";
    	  session_start();
        $sesion = $_SESSION['username'];
    	}

    }

    catch(PDOException $e) {
      echo $e->getMessage();
    }

  }


?>
