<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybór</title>
  </head>
  <body>
    <?php
      session_start();
      $connect = new mysqli("localhost","root","","dziennik");
      $sqldel = "DELETE FROM `ocena` WHERE `ocena`.`id_oceny` = '$_GET[id_oceny]'";
      $connect->query($sqldel);
      header("Location: nauczycielindex.php");
      $connect->close();
     ?>
  </body>
</html>
