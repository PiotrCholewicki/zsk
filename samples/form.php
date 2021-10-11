<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wycieczki</title>
  </head>
  <body>
      <form action="form2.php" method="GET">
        <h3>Oferta</h3>
        <input type="submit" value="Przejdź">
      </form>
      <br>
      <h3>Podaj dane</h3>
      <form action="form2_2.php" method="POST">
          <input type="text" name="name" placeholder="Podaj imię"><br>
          <input type="text" name="surname" placeholder="Podaj nazwisko"><br>
          <input type="radio" name="race" value="white">Biały<br>
          <input type="radio" name="race" value="black">Czarny<br>
          <input type="radio" name="race" value="yellow">Żółty<br>
          <input type="submit" value="Wyślij">
      </form>
  </body>
</html>
