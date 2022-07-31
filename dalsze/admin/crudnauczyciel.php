<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
  <body>
    <h2>Wyszukaj nauczyciela</h2>
    <form method="post">
      <input type="text" name="login" placeholder="Wpisz login nauczyciela do edytowania">
      <input type="submit" value="PRZEŚLIJ">
      <table>
          <?php
          if(isset($_POST['login'])){
            $connect = new mysqli("localhost","root","","dziennik");
            $sql = "SELECT imie,nazwisko,login,haslo FROM nauczyciel where login = '$_POST[login]'";
            $result = $connect->query($sql);
            while ($key = $result->fetch_assoc()){
              echo<<<TABLE
              <tr>
                <td>$key[imie]</td>
                <td>$key[nazwisko]</td>
                <td>$key[login]</td>
                <td>$key[haslo]</td>
                <td></td>
                <td><a href="usunnauczyciela.php?login=$_POST[login]">USUŃ</a></td>
                </form>
              </tr>
              <tr>
                <form method='get' action="updatenauczyciela.php">
                <td><input type="text" name="imie" placeholder="Ustaw imie"></td>
                <td><input type="text" name="nazwisko" placeholder="Ustaw nazwisko"></td>
                <td><input type="text" name="login" placeholder="Ustaw login"></td>
                <td><input type="text" name="haslo" placeholder="Ustaw haslo"></td>
                <td><input type="text" name="getlogin" value='$_POST[login]' hidden></td>
                <td><input type="submit" value="PRZEŚLIJ"></td>
              </tr>
      </table>
        <h2>MENU PRZYPISYWANIA</h2>
        Nauczyciel naucza w klasach:</br>
TABLE;
            $sql2 = "SELECT nauczyciel.login, klasa.nazwa_klasy as klasa FROM `nauczyciel_klasa` JOIN nauczyciel ON nauczyciel_klasa.id_nauczyciela = nauczyciel.id_nauczyciela JOIN Klasa on nauczyciel_klasa.id_klasy = klasa.id_klasy WHERE nauczyciel.login = '$_POST[login]'; ";
            $result2 = $connect->query($sql2);
            while($key2=$result2->fetch_assoc()){
              echo<<<TABLE
              <table>
                    <tr>
                      <td>$key2[klasa]</td>
                      <td><a href="wypiszklase.php?login=$_POST[login]&klasa=$key2[klasa]">WYPISZ</a></td>
                    </tr>
            </table>
TABLE;
}
          echo "Nauczyciel naucza przedmiotów:</br>";
          $sql3 = "SELECT nauczyciel.login, przedmiot.nazwa_przedmiotu as przedmiot FROM `nauczyciel_przedmiot` JOIN nauczyciel ON nauczyciel_przedmiot.id_nauczyciela = nauczyciel.id_nauczyciela JOIN przedmiot on nauczyciel_przedmiot.id_przedmiotu = przedmiot.id_przedmiotu WHERE nauczyciel.login = '$_POST[login]'; ";
          $result3 = $connect->query($sql3);
          while($key3=$result3->fetch_assoc()){
            echo<<<TABLE
            <table>
                  <tr>
                    <td>$key3[przedmiot]</td>
                    <td><a href="wypiszprzedmiot.php?login=$_POST[login]&przedmiot=$key3[przedmiot]">WYPISZ</a></td>
                  </tr>
          </table>
TABLE;
}
          echo<<<AAA
          Dopisz nauczyciela do klasy:
          <form method="get">
AAA;
          $sqlkl = "SELECT id_klasy,nazwa_klasy from klasa ";
          $resultkl = $connect->query($sqlkl);
          while($keykl=$resultkl->fetch_assoc()){
            echo<<<TABLE
            <table>
                  <tr>
                    <td hidden>$keykl[id_klasy]</td>
                    <td>$keykl[nazwa_klasy]</td>
                    <td><a href="dodajdoklasy.php?login=$_POST[login]&klasa=$keykl[id_klasy]">DOPISZ</a></td>
                  </tr>
          </table>
TABLE;
        echo "</form>";
    }
        echo<<<AAA
        Dopisz nauczyciela do przedmiotu:
        <form method="get">
AAA;
        $sqlpr = "SELECT id_przedmiotu,nazwa_przedmiotu from przedmiot ";
        $resultpr = $connect->query($sqlpr);
        while($keypr=$resultpr->fetch_assoc()){
          echo<<<TABLE
          <table>
                <tr>
                  <td hidden>$keypr[id_przedmiotu]</td>
                  <td>$keypr[nazwa_przedmiotu]</td>
                  <td><a href="dodajdoprzedmiotu.php?login=$_POST[login]&przedmiot=$keypr[id_przedmiotu]">DOPISZ</a></td>
                </tr>
        </table>
TABLE;
      echo "</form>";
      }
    }
  }
       ?>
    </form>
    <div id = "insert">
      <h2>DODAJ NAUCZYCIELA</h2>
      <form method="post">
        <input type="text" name="iImie" placeholder="Imię">
        <input type="text" name="iNazwisko" placeholder="Nazwisko">
        </select>
        <input type="text" name="iLogin" placeholder="Login">
        <input type="text" name="iHaslo" placeholder="Hasło">
        <input type="submit"value="Dodaj użytkownika">
        <?php
        if (isset($_POST['iImie'])) {
          $connect = new mysqli("localhost","root","","dziennik");
          $password_hashed = password_hash($_POST['iHaslo'], PASSWORD_ARGON2I);
          $sql = "INSERT INTO `nauczyciel` (`imie`, `nazwisko`, `login`, `haslo`) VALUES ('$_POST[iImie]', '$_POST[iNazwisko]', '$_POST[iLogin]', '$password_hashed');";
          $connect->query($sql);
          $connect->close();
      }
         ?>
      </form>
    </div>
  </body>
</html>
