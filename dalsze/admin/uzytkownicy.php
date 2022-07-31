<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Uzytkownicy</title>
  </head>
  <body>
    <table>
        <?php
        $connect = new mysqli("localhost","root","","dziennik");
        $sql = "SELECT DISTINCT id_ucznia,imie,nazwisko,login,haslo,klasa.nazwa_klasy FROM `uczen` JOIN klasa where uczen.id_klasy = klasa.id_klasy; ";
        $result=$connect->query($sql);
        echo "<h2>Uczniowie</h2>";
        echo <<< LABEL
        <tr>
          <th>id</th>
          <th>imie</th>
          <th>nazwisko</th>
          <th>login</th>
          <th>klasa</th>
        </tr>
LABEL;
        while ($key = $result->fetch_assoc()) {
          echo<<<TABLE
          <tr>
            <td>$key[id_ucznia]</td>
            <td>$key[imie]</td>
            <td>$key[nazwisko]</td>
            <td>$key[login]</td>
            <td>$key[nazwa_klasy]</td>
          </tr>
TABLE;
      ?>
    </table>
    <table>
      <?php
        }
        $sql = "Select * from nauczyciel";
        $result=$connect->query($sql);
        echo "<h2>Nauczyciele</h2>";
        echo <<< LABEL
        <tr>
          <th>id</th>
          <th>imie</th>
          <th>nazwisko</th>
          <th>login</th>
        </tr>
LABEL;
        while ($key = $result->fetch_assoc()) {
          echo<<<TABLE

          <tr>
            <td>$key[id_nauczyciela]</td>
            <td>$key[imie]</td>
            <td>$key[nazwisko]</td>
            <td>$key[login]</td>
          </tr>
TABLE;
        }
        ?>
      </table>
      <table>
        <?php
          $sql = "Select * from admin";
          $result=$connect->query($sql);
          echo "<h2>Administratorzy</h2>";
          echo <<< LABEL
          <tr>
            <th>id</th>
            <th>login</th>
          </tr>
LABEL;
          while ($key = $result->fetch_assoc()) {
            echo<<<TABLE
            <tr>
              <td>$key[id_admina]</td>
              <td>$key[login]</td>
            </tr>
TABLE;
          }
          ?>
        </table>
  </body>
</html>
