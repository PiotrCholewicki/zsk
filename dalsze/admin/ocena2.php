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
      $sql = "SELECT id_ucznia, imie, nazwisko FROM uczen JOIN klasa on uczen.id_klasy = klasa.id_klasy WHERE klasa.id_klasy='$_GET[id_klasy]'";
      $result = $connect->query($sql);
      while ($key = $result->fetch_assoc()) {
        echo<<<AAA
        <tr>
          <td><a href = "ocena3.php?id_ucznia=$key[id_ucznia]">$key[imie] $key[nazwisko]</a></td>
        <tr>
  AAA;
      }
      $connect->close();
       ?>
    </table>
  </body>
</html>
