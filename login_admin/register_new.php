<?php include("/var/www/html/books/components/header.php"); ?>
<div class="loginBtns controlBtns">
  <a class="menuBtn login" href="/books/login_admin/login_form.php">Log In</a>
  <a class="menuBtn register" href="/books/login_admin/register_new.php">Registrate</a>
</div>
<div class="adminBtns controlBtns">
  <a class="menuBtn" href="/books/pdo_test/admin.php">Admin</a>
  <a class="menuBtn" href="/books/login_admin/logout.php">Log Out</a>
</div>
</header>

    <form class="submitForms" action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <h3>Registracion Form</h3>
  		Username: <input class="textboxs" type="text" name="username" /><br />
  		Password: <input class="textboxs" type="password" name="password" /><br />
  		First name: <input class="textboxs" type="text" name="first_name" /><br />
  		Last name: <input class="textboxs" type="text" name="last_name" /><br />
  		Email: <input class="textboxs" type="type" name="email" /><br />

  		<input class="submit" type="submit" name="submit" value="Register" />
  	</form>

<?php
require_once("/var/www/html/books/pdo_test/db2.php");
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// $username	= $_POST['username'];
// $password	= $_POST['password'];
// $first_name	= $_POST['first_name'];
// $last_name	= $_POST['last_name'];
// $email		= $_POST['email'];

// Insert User in tu DB
if(isset($_POST['submit'])) {

  $username	= $_POST['username'];
  $password	= $_POST['password'];
  $first_name	= $_POST['first_name'];
  $last_name	= $_POST['last_name'];
  $email		= $_POST['email'];
  // check if username and email exist else insert
  $exists = 0;
	$result = $dbh->query("SELECT username from login WHERE username = '{$username}' LIMIT 1");
	if ($result->rowCount()== 1) {
		$exists = 1;
		$result = $dbh->query("SELECT email from login WHERE email = '{$email}' LIMIT 1");
		if ($result->rowCount()== 1) $exists = 2;
	} else {
		$result = $dbh->query("SELECT email from login WHERE email = '{$email}' LIMIT 1");
		if ($result->rowCount()== 1) $exists = 3;
	}

	if ($exists == 1) echo "<p>Username already exists!</p>";
	else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
	else if ($exists == 3) echo "<p>Email already exists!</p>";
  // End Chack

  else {
    try {
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO login (username, password, first_name, last_name, email) VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."')";

      if ($dbh->query($sql)) {
        echo 'New Record Inserted Successfully';
        echo '<br>';
      } else {
        echo 'Data not successfully Inserted';
      }

    }

    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
}
 ?>
  </body>
</html>
