<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wyświetlanie ocen</title>
  </head>
  <body>
    <table>
      <tr>
        <th>Przedmiot</th>
        <th>Ocena</th>
        <th>Data wystawienia</th>
        <th>Imię nauczyciela</th>
        <th>Nazwisko nauczyciela</th>
      </tr>
        <?php
        session_start();
        $connect = new mysqli("localhost","root","","dziennik");
        $sql = "SELECT ocena, data_wystawienia AS data, nauczyciel.imie AS imie, nauczyciel.nazwisko AS nazwisko,
        przedmiot.nazwa_przedmiotu AS przedmiot FROM ocena
        JOIN nauczyciel on ocena.id_nauczyciela = nauczyciel.id_nauczyciela
        JOIN uczen on ocena.id_ucznia = uczen.id_ucznia
        JOIN przedmiot on ocena.id_przedmiotu = przedmiot.id_przedmiotu
        WHERE uczen.login = '$_SESSION[user]'";
        $result = $connect->query($sql);
        while ($key = $result->fetch_assoc()){
          echo<<<TABLE
          <tr>
            <td>$key[przedmiot]</td>
            <td>$key[ocena]</td>
            <td>$key[data]</td>
            <td>$key[imie]</td>
            <td>$key[nazwisko]</td>
          </tr>
TABLE;
      }
         ?>
    </table>
  </body>
</html>
