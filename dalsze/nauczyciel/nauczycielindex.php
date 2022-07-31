<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona nauczyciela</title>
  </head>
  <body>
    Witaj,
    <?php
      session_start();
      echo $_SESSION['teacher'];
     ?><br>
    <a href="ocenynauczyciel.php">Wpisz ocenę</a><br>
    <a href="modyfikacjenauczyciel.php">Zobacz modyfikacje</a><br>
    <a href="../uczen/wyloguj.php">Wyloguj</a>
  </body>
</html>
