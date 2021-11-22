<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rozne operacje</title>
    <style>
      table,tr,td,th{
        border: 1px solid gray;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <?php
    $connect = new mysqli("localhost","root","","baza1");
    $sql = "select * from `studenci`";
    $result = $connect->query($sql);
    echo "<table>";
    echo <<< label
      <tr>
        <td>ID</td>
        <td>Imie</td>
        <td>Nazwisko</td>
        <td>Obywatelstwo</td>
        <td>Usuwanie</td>
      </tr>

label;
    while($wiersz = $result->fetch_assoc())
    {
      echo <<< label
      <tr>
        <td>$wiersz[id]</td>
        <td>$wiersz[imie]</td>
        <td>$wiersz[nazwisko]</td>
        <td>$wiersz[obywatelstwo]</td>
        <td><a href="/phpprojects/kart2/cwiczenie1.php?usun=$wiersz[id]">Usuń rekord</a></td>
      </tr>
label;
    }
    echo "</table>";
    if(isset($_GET['usun'])){
      $id = $_GET['usun'];
      $sql = "DELETE FROM `studenci` WHERE `studenci`.`id` = $id";
      $result = $connect->query($sql);
      header('location: /phpprojects/kart2/cwiczenie1.php');
    }
    echo<<<dodaj
    <br>
    <form method="post">
      <input type = "text" name = "imie" placeholder = "Podaj imię"><br>
      <input type = "text" name = "nazwisko" placeholder = "Podaj nazwisko"><br>
      <input type = "text" name = "obywatelstwo" placeholder = "Podaj obywatelstwo"><br>
      <input type = submit value="Prześlij dane"><br><br>
    </form>
dodaj;
  if(!empty($_POST))
  {
    $sql = "INSERT INTO `studenci` (`id`, `imie`, `nazwisko`, `obywatelstwo`) VALUES (NULL, '$_POST[imie]', '$_POST[nazwisko]', '$_POST[obywatelstwo]'); ";
    $result = $connect->query($sql);
    header('location: cwiczenie1.php');
  }
  echo<<< UPDATE
  <form method="GET">
    <input type = "text" name = "id" placeholder = "Podaj id"><br>
    <input type = "text" name = "imie" placeholder = "Podaj imię"><br>
    <input type = "text" name = "nazwisko" placeholder = "Podaj nazwisko"><br>
    <input type = "text" name = "obywatelstwo" placeholder = "Podaj obywatelstwo"><br>
    <input type = submit value="Prześlij dane"><br>
  </form>
UPDATE;
  if(isset($_GET['id'])){
    $sql = "UPDATE `studenci` SET Imie = '$_GET[imie]', Nazwisko = '$_GET[nazwisko]', Obywatelstwo = '$_GET[obywatelstwo]' WHERE '$_GET[id]' = id";
    $result = $connect->query($sql);
    header("location: cwiczenie1.php");
  }
     ?>
  </body>
</html>
