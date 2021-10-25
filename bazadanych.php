<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>użytkownicy</title>
  </head>
  <body>
    <?php
    //serwer,uzytkownik,hasło puste, baza danych
    $connect = new mysqli("localhost", "root", "", "4dg1_baza1");
    $sql = "SELECT * FROM `user`";
    //wysylamy to zapytanie gdzies
    $result = $connect->query($sql);
    // metoda zrobienia z result tablicy asocjacyjnej

    while ($rows=$result->fetch_assoc()) {
      echo <<< ROW
      id: $rows[id]<br>
      Imię: $rows[name]<br>
      Nazwisko: $rows[surname]<br>
      Data urodzin: $rows[birthday]<br>
      <br>

ROW;
    }

     ?>
  </body>
</html>
