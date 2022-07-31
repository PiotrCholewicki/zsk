<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybierz akcję</title>
  </head>
  <body>
    Wybierz akcję:
    <?php
    session_start();
    echo "<br><a href='ocena.php?uczen=$_GET[uczen]'>Wpisz nową ocenę</a><br>";
    echo "<a href='zmiana.php?uczen=$_GET[uczen]'>zmień ocenę</a>";
     ?>
  </body>
</html>
