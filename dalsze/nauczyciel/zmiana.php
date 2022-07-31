<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zmień ocenę</title>
  </head>
  <body>
    Zmień ocenę ucznia
    <table>
      <tr>
        <th>Ocena</th>
        <th>Przedmiot</th>
      </tr>
      <?php
      session_start();
      $connect = new mysqli("localhost","root","","dziennik");
      $sqlzm = "SELECT id_oceny, ocena,przedmiot.nazwa_przedmiotu as przedmiot FROM ocena
      JOIN przedmiot on ocena.id_przedmiotu = przedmiot.id_przedmiotu
      WHERE ocena.id_ucznia = '$_GET[uczen]'";
      $resultzm = $connect->query($sqlzm);
      while ($keyzm=$resultzm->fetch_assoc()) {
        echo <<< AAA
        <tr>
        <td>$keyzm[ocena]</td>
        <td>$keyzm[przedmiot]</td>
        <td><a href="usunocene.php?id_oceny=$keyzm[id_oceny]&ocena=$keyzm[ocena]">Usuń ocenę</a></td>
        <td><a href="edytujocene.php?id_oceny=$keyzm[id_oceny]&ocena=$keyzm[ocena]">Edytuj ocenę</a></td>
        </tr>
AAA;
      }
     ?>
     </table>
  </body>
</html>
