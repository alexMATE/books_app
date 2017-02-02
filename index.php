<?php include("/var/www/html/books/components/header.php"); ?>
<div class="loginBtns controlBtns">
  <a class="menuBtn login" href="login_admin/login_form.php">Log In</a>
  <a class="menuBtn register" href="login_admin/register_new.php">Registrate</a>
</div>
<div class="adminBtns controlBtns">
  <a class="menuBtn" href="pdo_test/admin.php">Admin</a>
  <a class="menuBtn" href="login_admin/logout.php">Log Out</a>
</div>
</header>
<div id="main">
  <div class="content">
  <?php
  require_once '/var/www/html/books/functions/display_index.php';
   ?>
   </div>
 </div>
</body>
</html>
