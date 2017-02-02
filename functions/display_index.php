<?php
require_once '/var/www/html/books/pdo_test/db2.php';
$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$query = $dbh->query('SELECT book_name, book_author, book_id, post_user FROM booksDB');
while ($r = $query->fetch()) {
  echo'<div class="boxes">';
  echo '<br>';
  echo '<h4>' . $r['book_name'] . '</h4>';
  echo $r['book_author'], '<br>';
  echo '<span class="readNow">';
  echo 'By '.$r['post_user'], '<br>';
  echo '</span>';
  echo'</div>';
}

 ?>
