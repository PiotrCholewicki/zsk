<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona ucznia</title>
  </head>
  <body>

    <div>
      Witaj, <?php
      session_start();
      echo $_SESSION['user'];
      echo "<br><a href='oceny.php'>Zobacz oceny</a><br>
      <a href='modyfikacje.php'>Zobacz modyfikacje ocen</a><br>
      <a href='wyloguj.php'>Wyloguj się</a>";
       ?>
    </div>
  </body>
</html>
