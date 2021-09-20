<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Dane użytkownika<h3>
      <form action="plik2.php" method="get">
        <input type="text" name="name" placeholder="Imię">
        <input type="text" name="surname" placeholder="Nazwisko">
        <input type="text" name="nationality" placeholder="Narodowość">
        <input type="number" name="age" placeholder="Wiek">
        <input type="submit" value="Zatwierdź">
        <?php
        if (!empty($_GET['name']) && !empty($_GET['surname']) && !empty($_GET['age']) && !empty($_GET['nationality'])){
          $name=ucfirst(strtolower($_GET['name']));
          echo <<< L
          <br>
          Imię: $name<br>
          Nazwisko: $_GET[surname]<br>
          Narodowość: $_GET[nationality]<br>
          Wiek: $_GET[age] lat<br>
  L;      }
        else {
          echo "Wypełnij wszystkie dane";
        }
         ?>
  </body>
</html>
