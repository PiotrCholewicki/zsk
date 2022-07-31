<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybierz ucznia</title>
  </head>
  <body>
    Wybierz ucznia:<br>
    <?php
      session_start();
      $connect = new mysqli("localhost","root","","dziennik");
      $sql2 = "SELECT id_ucznia,imie,nazwisko FROM uczen where id_klasy = '$_GET[id_klasy]'";
      $result2 = $connect->query($sql2);
      $connect->query($sql2);
      while($key2=$result2->fetch_assoc()){
        echo<<<AAA
        <a href='wybor.php?&uczen=$key2[id_ucznia]'>$key2[imie] $key2[nazwisko]</a><br>
AAA;
      }
      $connect->close();
     ?>
  </body>
</html>
