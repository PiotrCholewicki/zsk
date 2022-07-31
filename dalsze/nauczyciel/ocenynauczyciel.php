<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybierz klasę</title>
  </head>
  <body>
    <form method="get">
      Wybierz klasę:<br>
        <?php
        session_start();
        $connect = new mysqli("localhost","root","","dziennik");
        $sql = "SELECT klasa.id_klasy as id, klasa.nazwa_klasy as klasa FROM `nauczyciel_klasa`
        JOIN klasa on nauczyciel_klasa.id_klasy = klasa.id_klasy
        JOIN nauczyciel ON nauczyciel_klasa.id_nauczyciela = nauczyciel.id_nauczyciela
        WHERE nauczyciel.login = '$_SESSION[teacher]'; ";
        $result = $connect->query($sql);
        while($key = $result->fetch_assoc()) {
          echo<<<AAA
          <a href="wpisz.php?id_klasy=$key[id]">$key[klasa]</a><br>
AAA;
        }
        $connect->close();
         ?>
    </form>
  </body>
</html>
