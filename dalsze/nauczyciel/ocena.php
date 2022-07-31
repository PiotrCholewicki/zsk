<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wpisz ocenę</title>
  </head>
  <body>
    <form method="post">
      Wpisz ocenę<br><br>
      <?php
      session_start();
       ?>
      <input type="text" name="ocena" placeholder="Ocena"><br><br>
      Wybierz przedmiot: <select name="przedmiot">
        <?php
        $connect = new mysqli("localhost","root","","dziennik");
        $sql3 = "SELECT przedmiot.id_przedmiotu as id, przedmiot.nazwa_przedmiotu as przedmiot FROM nauczyciel_przedmiot
        JOIN nauczyciel ON nauczyciel_przedmiot.id_nauczyciela = nauczyciel.id_nauczyciela
        JOIN przedmiot ON nauczyciel_przedmiot.id_przedmiotu = przedmiot.id_przedmiotu
        WHERE nauczyciel.login='$_SESSION[teacher]'";
        $result3 = $connect->query($sql3);
        while ($key3=$result3->fetch_assoc()) {
          echo<<<AAA
          <option value=$key3[id]>$key3[przedmiot]</option>
AAA;
        }
        $sql4 = "SELECT id_nauczyciela FROM nauczyciel WHERE login='$_SESSION[teacher]'";
        $result4 = $connect->query($sql4);
        $key4=$result4->fetch_assoc();
        $id_nauczyciela = $key4['id_nauczyciela'];
         ?>
      </select>
      <input type="submit" value="Wpisz ocenę">
      <?php
      if(isset($_POST['ocena'])){
        $sql5 = "INSERT INTO `ocena` (`ocena`, `id_nauczyciela`, `id_ucznia`, `id_przedmiotu`)
         VALUES ('$_POST[ocena]', '$id_nauczyciela', '$_GET[uczen]', '$_POST[przedmiot]')";
         $connect->query($sql5);
         header("Location: nauczycielindex.php");
      }
       ?>
    </form>
    <?php
     $connect->close();
     ?>
  </body>
</html>
