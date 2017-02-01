
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
  <script>
   WebFont.load({
      google: {
        families: ['Roboto Condensed:400,700']
      }
    });
  </script>
  <link rel="stylesheet" href="style.css">
  <title>Insert Data</title>
</head>
<body>

 <div id="main">
 <header class="header">
   <div class="logo">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 509.287 509.287" width="100%" height="100%"><circle cx="254.644" cy="254.644" r="254.644" fill="#76D95B"/><path d="M503.862 112.572l-8.816-14.58H14.24l-8.815 14.58v305.505h222.77c4.748 9.833 14.92 16.954 26.45 16.954 11.527 0 22.04-6.78 26.447-16.953h222.77V112.572z" fill="#393D47"/><path d="M495.046 98.33H14.24v310.93h221.755c1.695 8.817 9.494 15.598 18.988 15.598s17.293-6.78 18.988-15.597h221.755V98.33h-.68z" fill="#4F5565"/><path d="M254.644 392.646c-71.205-20.683-146.48-20.683-217.685 0V88.836c71.204-20.682 146.478-20.682 217.684 0v303.81z" fill="#FCFCFD"/><g fill="#F1F3F7"><path d="M214.972 146.48c-45.097-13.225-93.245-13.225-138.342 0V131.9c45.097-13.225 93.245-13.225 138.342 0v14.58zM214.972 197.34c-45.097-13.224-93.245-13.224-138.342 0v-14.58c45.097-13.224 93.245-13.224 138.342 0v14.58zM214.972 248.2c-45.097-13.223-93.245-13.223-138.342 0v-14.58c45.097-13.223 93.245-13.223 138.342 0v14.58zM214.972 298.723c-45.097-13.224-93.245-13.224-138.342 0v-14.58c45.097-13.224 93.245-13.224 138.342 0v14.58zM214.972 349.584c-45.097-13.224-93.245-13.224-138.342 0v-14.58c45.097-13.224 93.245-13.224 138.342 0v14.58zM472.328 392.646c-71.205-20.683-146.48-20.683-217.685 0V88.836c71.205-20.682 146.48-20.682 217.685 0v303.81z"/></g><g fill="#DEDEDF"><path d="M432.657 146.48c-45.097-13.225-93.245-13.225-138.342 0V131.9c45.097-13.225 93.245-13.225 138.342 0v14.58zM432.657 197.34c-45.097-13.224-93.245-13.224-138.342 0v-14.58c45.097-13.224 93.245-13.224 138.342 0v14.58zM432.657 248.2c-45.097-13.223-93.245-13.223-138.342 0v-14.58c45.097-13.223 93.245-13.223 138.342 0v14.58zM432.657 298.723c-45.097-13.224-93.245-13.224-138.342 0v-14.58c45.097-13.224 93.245-13.224 138.342 0v14.58zM432.657 349.584c-45.097-13.224-93.245-13.224-138.342 0v-14.58c45.097-13.224 93.245-13.224 138.342 0v14.58z"/></g></svg>
   </div>
 </header>
   <div id="login">
   <h2 class="head-form">Upload Books Form</h2>
   <hr/>
     <form action="" method="post" class="form">
       <label>Book name :</label>
       <input type="text" name="book_name" class="textboxs name" required="required" placeholder="Please Enter Name"/><br /><br />
       <label>Book author :</label>
       <input type="text" name="book_author" class="textboxs author" required="required" placeholder="Author"/><br/><br />
       <input type="submit" value=" Submit " name="submit" class="submit submit-form"/><br />
     </form>
   </div>
   <div class="content">

     <?php
     require_once 'db2.php';
     require_once 'view.php';
      ?>

   </div>

 </div>
 </body>
 </html>
