<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
    <script>
     WebFont.load({
        google: {
          families: ['Roboto Condensed:300,400,700']
        }
      });
    </script>
    <link rel="stylesheet" href="pdo_test/style.css">
  </head>
<body>
  <a href="login_admin/login_form.php">Log In</a>
  <br>
  <a href="login_admin/register_new.php">Registrate</a>
  <br>
  <a href="pdo_test/admin.php">Admin</a>
  <br>
  <a href="login_admin/logout.php">Log Out</a>
  <br>
<div id="main">
  <div class="content">
  <?php
  require_once '/var/www/html/books/functions/display_index.php';
   ?>
   </div>
 </div>
</body>
</html>
