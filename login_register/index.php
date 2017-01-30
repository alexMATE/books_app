<?php
require_once 'core/init.php';

$user = DB::getInstance()->insert('users' , array(
  'username' => 'Dele',
  'password' => 'password',
  'salt' => 'salt'
));



 ?>
