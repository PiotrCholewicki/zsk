<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybierz klasę</title>
  </head>
  <body>
    <table>
      <?php
      $connect = new mysqli("localhost","root","","dziennik");
      session_start();
      $sql = "SELECT id_klasy, nazwa_klasy FROM klasa";
      $result = $connect->query($sql);
      while ($key = $result->fetch_assoc()) {
        echo<<<AAA
        <tr>
          <td><a href = "ocena2.php?id_klasy=$key[id_klasy]">$key[nazwa_klasy]</a></td>
        <tr>
  AAA;
      }
       ?>
    </table>

  </body>
</html>
