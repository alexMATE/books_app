<?php
require_once("/var/www/html/books/login_admin/login_new.php");
 ?>

<?php include("/var/www/html/books/components/header.php"); ?>
<div class="loginBtns controlBtns">
  <a class="menuBtn register" href="/books/login_admin/register_new.php">Registrate</a>
</div>
<div class="adminBtns controlBtns">
  <a class="menuBtn" href="/books/pdo_test/admin.php">Admin</a>
  <a class="menuBtn" href="/books/login_admin/logout.php">Log Out</a>
</div>
</header>
     <form class="submitForms" action="<?=$_SERVER['PHP_SELF']?>" method="post">
       <h3>Log In</h3>
       Username: <input class="textboxs" type="text" name="username" /><br />
       Password: <input class="textboxs" type="password" name="password" /><br />

       <input class="submit" type="submit" name="submit" value="Login" />
     </form>
   </body>
 </html>
