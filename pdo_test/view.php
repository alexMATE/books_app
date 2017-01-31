<html>
<head>
<title>insert data in database using PDO(php data object)</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="main">
<h1>Insert data into database using PDO</h1>
  <div id="login">
  <h2>Upload Books Form</h2>
  <hr/>
    <form action="" method="post">
      <label>Book name :</label>
      <input type="text" name="book_name" id="name" required="required" placeholder="Please Enter Name"/><br /><br />
      <label>Book author :</label>
      <input type="text" name="book_author" id="author" required="required" placeholder="Author"/><br/><br />
      <input type="submit" value=" Submit " name="submit"/><br />
    </form>
  </div>
</div>

<?php
require_once 'db2.php';
// Conecting and write data

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if(isset($_POST['submit'])) {

  try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO booksDB (book_name, book_author) VALUES ('".$_POST["book_name"]."','".$_POST["book_author"]."')";

    if ($dbh->query($sql)) {
      echo 'New Record Inserted Successfully';
      echo '<br>';
    } else {
      echo 'Data not successfully Inserted';
    }
    // $dbh = null;
  }

  catch(PDOException $e) {
    echo $e->getMessage();
  }
}

// Display Name and Author

$query = $dbh->query('SELECT book_name, book_author, book_id FROM booksDB');

while ($r = $query->fetch()) {
  echo '<br>';
  echo '<h4>' . $r['book_name'] . '</h4>';
  echo $r['book_author'], '<br>';
  echo '<a href="delete.php"id="'.$r["book_id"].'">Delete</a>';



}
// die();



// Delete



 ?>



</body>
</html>
