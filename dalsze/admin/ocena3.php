<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wybierz klasę</title>
  </head>
  <body>
    Wpisz ocenę:
    <form method="post">
      <input type="text" name="ocena">
      <select name="przedmiot">
        <?php
        $connect = new mysqli("localhost","root","","dziennik");
        $sql = "Select * from przedmiot";
        $result = $connect->query($sql);
        while ($key = $result->fetch_assoc()) {
          echo "<option value=$key[id_przedmiotu]>$key[nazwa_przedmiotu]</option>";
        }
         ?>
      </select>
      <input type="submit" value="Prześlij">
    </form>
    <?php
    if (isset($_POST['ocena'])) {
      $sql2 = "INSERT INTO `ocena` (`id_oceny`, `ocena`, `data_wystawienia`, `id_nauczyciela`, `id_ucznia`, `id_przedmiotu`) VALUES (NULL, '$_POST[ocena]', now(), '9', '$_GET[id_ucznia]', '$_POST[przedmiot]') ";
      $connect->query($sql2);
      header("Location: adminindex.php");
    }
    $connect->close()
     ?>
  </body>
</html>
