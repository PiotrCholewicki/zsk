<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modyfikacje ocen</title>
  </head>
  <body>
    Oceny edytowane przez nauczyciela:
    <table>
      <?php
      session_start();
      $connect = new mysqli("localhost","root","","dziennik");
      $sql1 = "Select id_nauczyciela as id from nauczyciel where login = '$_SESSION[teacher]'";
      $result1 = $connect->query($sql1);
      $key1 = $result1->fetch_assoc();
      $id = $key1['id'];
      $sql2 = "SELECT uczen.imie as imie, uczen.nazwisko as nazwisko, stara_ocena, ocena.ocena as nowa_ocena, przedmiot.nazwa_przedmiotu as przedmiot, data_modyfikacji FROM `ocenamodyfikacja`
      JOIN ocena on ocenamodyfikacja.id_oceny = ocena.id_oceny JOIN uczen on ocena.id_ucznia = uczen.id_ucznia
      JOIN nauczyciel on ocenamodyfikacja.id_nauczyciela = nauczyciel.id_nauczyciela
      JOIN przedmiot on ocena.id_przedmiotu = przedmiot.id_przedmiotu
      WHERE nauczyciel.login = '$_SESSION[teacher]';";
      $result = $connect->query($sql2);
      while ($key=$result->fetch_assoc()) {
        echo<<<AAA
        <tr>
        <td>Zmieniono ocenę dla ucznia $key[imie] $key[nazwisko] z $key[stara_ocena] na $key[nowa_ocena] z przedmiotu $key[przedmiot] dnia $key[data_modyfikacji]</td>
        </tr>
AAA;
      }

      $connect->close();
     ?>
     </table>
  </body>
</html>
