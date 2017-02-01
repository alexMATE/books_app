
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

  }

  catch(PDOException $e) {
    echo $e->getMessage();
  }
}

// Display Name/Author and Delete

$query = $dbh->query('SELECT book_name, book_author, book_id FROM booksDB');

while ($r = $query->fetch()) {
  echo'<div class="boxes"';
  echo '<br>';
  echo '<h4>' . $r['book_name'] . '</h4>';
  echo $r['book_author'], '<br>';
  // Delete
  echo '<form action="" method="post">';
  echo '<input type="submit" class="submit submit-delete" value=" Delate " name="'.$r['book_id'].'"/>';
  echo '</form>';
 echo '</div>';
  $id = $r['book_id'];
  if(isset($_POST[$id])) {

                try {
                // set the PDO error mode to exception
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // sql to delete a record
                $sql = "DELETE FROM booksDB WHERE book_id='$id'";

                // use exec() because no results are returned
                $dbh->exec($sql);
                echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }

            $dbh = null;
            header("Refresh:0");

  }



}



 ?>



</body>
</html>
