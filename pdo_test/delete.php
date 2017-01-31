<?php
require_once 'view.php';
require_once 'db2.php';



$query = $dbh->query('SELECT book_name, book_author, book_id FROM booksDB');

while ($r = $query->fetch()) {

  $id = $r['book_id'];
  echo $id;


//   try {
//       $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//       // set the PDO error mode to exception
//       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//       // sql to delete a record
//       $sql = "DELETE FROM booksDB WHERE book_id='$id'";
//
//       // use exec() because no results are returned
//       $dbh->exec($sql);
//       echo "Record deleted successfully";
//       }
//   catch(PDOException $e)
//       {
//       echo $sql . "<br>" . $e->getMessage();
//       }
//
//   $dbh = null;
//
}

// header('Location: view.php');
 ?>
