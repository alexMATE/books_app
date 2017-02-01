<?php
require_once("/var/www/html/books/login_admin/login_new.php");

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Log In</title>
   </head>
   <body>
     <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
       Username: <input type="text" name="username" /><br />
       Password: <input type="password" name="password" /><br />

       <input type="submit" name="submit" value="Login" />
     </form>
   </body>
 </html>
