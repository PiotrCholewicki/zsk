<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Historia modyfikacji ocen</title>
  </head>
  <body>
    Zmiany ocen:
    <table>
      <?php
      $connect = new mysqli("localhost","root","","dziennik");
      session_start();
      $sql = "SELECT stara_ocena, nauczyciel.imie as imie, nauczyciel.nazwisko as nazwisko, przedmiot.nazwa_przedmiotu as przedmiot, ocena.ocena as nowa_ocena, data_modyfikacji
      FROM `ocenamodyfikacja`
      JOIN nauczyciel on ocenamodyfikacja.id_nauczyciela=nauczyciel.id_nauczyciela
      JOIN ocena on ocenamodyfikacja.id_oceny = ocena.id_oceny
      JOIN przedmiot on ocena.id_przedmiotu = przedmiot.id_przedmiotu
      join uczen on ocena.id_ucznia = uczen.id_ucznia
      WHERE uczen.login = '$_SESSION[user]'";
      $result = $connect->query($sql);
      while ($key=$result->fetch_assoc()) {
        echo<<<AAA
        <tr>
        <td>Ocenę zmienił/a $key[imie] $key[nazwisko] z $key[stara_ocena] na $key[nowa_ocena] z przedmiotu $key[przedmiot] dnia $key[data_modyfikacji]</td>
        </tr>
  AAA;
      }

      $connect->close();
       ?>
    </table>

  </body>
</html>
