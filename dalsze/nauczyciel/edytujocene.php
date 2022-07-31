<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zmień ocenę</title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="nowa_ocena" placeholder="Wpisz nową ocenę">
      <input type="submit" value="Zmień ocenę">
    </form>
  </body>
  <?php
    if (isset($_POST['nowa_ocena'])) {
      session_start();
      $connect = new mysqli("localhost","root","","dziennik");
      $sql1 = "Select id_nauczyciela as id from nauczyciel where login = '$_SESSION[teacher]'";
      $result1 = $connect->query($sql1);
      $key1 = $result1->fetch_assoc();
      $id = $key1['id'];
      $sql2 = "UPDATE `ocena` SET `ocena` = '$_POST[nowa_ocena]', `data_wystawienia` = now(), `id_nauczyciela` = '$id' WHERE `ocena`.`id_oceny` = '$_GET[id_oceny]'  ";
      $connect->query($sql2);
      $sql3 = "INSERT INTO `ocenamodyfikacja` (`id_oceny`, `rodzaj`, `data_modyfikacji`, `id_nauczyciela`, `stara_ocena`)
       VALUES ('$_GET[id_oceny]', '1', now(), '$id', '$_GET[ocena]') ";
      $connect->query($sql3);
      $connect->close();
      header("Location: nauczycielindex.php");
    }
   ?>
</html>
