<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Dane użytkownika<h3>
      <form>
        <input type="text" name = "name" placeholder="imię"><br><br>
        <input type="text" name = "surname" placeholder="nazwisko"><br><br>
        <input type="submit" value="wypełnij wszystkie dane"><br><br>
      </form>
      <?php
      if (!empty($_GET['name']) && !empty($_GET['surname'])){
        echo <<< L
        <br>
        Imię i nazwisko: $_GET[name] $_GET[surname]
L;      }
      else {
        echo "Wypełnij wszystkie dane";
      }
       ?>
  </body>
</html>
