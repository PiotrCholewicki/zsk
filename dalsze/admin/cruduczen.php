<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
  <body>
    <h2>Wyszukaj ucznia</h2>
    <form method="post">
      <input type="text" name="login" placeholder="Wpisz login ucznia do edytowania">
      <input type="submit" value="PRZEŚLIJ">
      <table>
          <?php
          if(isset($_POST['login'])){
            $connect = new mysqli("localhost","root","","dziennik");
            $sql = "SELECT id_ucznia,imie,nazwisko,login,haslo,klasa.id_klasy AS klasa FROM `uczen` JOIN klasa ON uczen.id_klasy = klasa.id_klasy WHERE login = '$_POST[login]'";
            $result = $connect->query($sql);
            while ($key = $result->fetch_assoc()){
              echo<<<TABLE
              <tr>
                <td>$key[imie]</td>
                <td>$key[nazwisko]</td>
                <td>$key[login]</td>
                <td>$key[klasa]</td>
                <td>$key[haslo]</td>
                <td></td>
                <td><a href="usunucznia.php?login=$_POST[login]">USUŃ</a></td>
                </form>
              </tr>
              <tr>
                <form method='get' action="updateucznia.php">
                <td><input type="text" name="imie" placeholder="Ustaw imie"></td>
                <td><input type="text" name="nazwisko" placeholder="Ustaw nazwisko"></td>
                <td><input type="text" name="login" placeholder="Ustaw login"></td>
                <td>Klasa: <select name = "klasa">
TABLE;
                $connect2= new mysqli("localhost","root","","dziennik");
                $sql2 = "SELECT id_klasy,nazwa_klasy FROM `klasa` WHERE 1; ";
                $result2 = $connect->query($sql2);
                while ($key2=$result2->fetch_assoc()){
                  echo<<<AAA
                  <option value=$key2[id_klasy]>$key2[nazwa_klasy]</option>
AAA;
                }
                $connect2->close();
                echo<<< TABLE
                </select></td>
                <td><input type="text" name="haslo" placeholder="Ustaw haslo"></td>
                <td><input type="text" name="getlogin" value='$_POST[login]' hidden></td>
                <td><input type="submit" value="PRZEŚLIJ"></td>
              </tr>
TABLE;
          }
        $connect->close();
    }
       ?>
     </table>
    </form>
    <div id = "insert">
      <h2>DODAJ UCZNIA</h2>
      <form method="post">
        <input type="text" name="iImie" placeholder="Imię">
        <input type="text" name="iNazwisko" placeholder="Nazwisko">
        Klasa: <select name = "iKlasa">
          <?php
          $connect = new mysqli("localhost","root","","dziennik");
          $sql = "SELECT id_klasy,nazwa_klasy FROM `klasa` WHERE 1; ";
          $result = $connect->query($sql);
          while ($key=$result->fetch_assoc()) {
            echo<<<AAA
            <option value=$key[id_klasy]>$key[nazwa_klasy]</option>
AAA;
          }
          $connect->close();
           ?>
        </select>
        <input type="text" name="iLogin" placeholder="Login">
        <input type="text" name="iHaslo" placeholder="Hasło">
        <input type="submit"value="Dodaj użytkownika">
        <?php
        if (isset($_POST['iImie'])) {
          $connect = new mysqli("localhost","root","","dziennik");
          $password_hashed = password_hash($_POST['iHaslo'], PASSWORD_ARGON2I);
          $sql = "INSERT INTO `uczen` (`imie`, `nazwisko`, `login`, `haslo`, `id_klasy`) VALUES ('$_POST[iImie]', '$_POST[iNazwisko]', '$_POST[iLogin]', '$password_hashed', '$_POST[iKlasa]');";
          $connect->query($sql);
          $connect->close();
      }
         ?>
      </form>

    </div>
  </body>
</html>
