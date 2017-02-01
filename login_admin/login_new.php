

<?php
session_start();
  require_once("/var/www/html/books/pdo_test/db2.php");
  require_once("/var/www/html/books/login_admin/login_form.php");
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


  if(isset($_POST['submit'])) {

    $username = $_POST['username'];
  	$password = $_POST['password'];


    try {
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * from login WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
      $result = $dbh->query($sql);


      if (!$result->rowCount() == 1) {
    		echo "<p>Invalid username/password combination</p>";
    	} else {
        $_SESSION['username'] = $username;
        echo $_SESSION['username'];

    	}

    }

    catch(PDOException $e) {
      echo $e->getMessage();
    }

  }


?>
