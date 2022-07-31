<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zaloguj się</title>
  </head>
  <body>
    <header>
      <h1>Zaloguj się do dziennika elektronicznego</h1>
    </header>
    <main>
      Wybierz typ użytkownika:
      <form class="login" action="dalsze/open.php" method="post">
        <select name="select">
           <option value="1">Uczeń</option>
           <option value="2">Nauczyciel</option>
           <option value="3">Administrator</option>
        </select>
        <input type="text" name="login" placeholder="Podaj login">
        <input type="password" name ="password" placeholder="Podaj hasło">
        <input type="submit">
        <?php
        if(isset($_GET['error'])){
          if($_GET['error']==1) echo "<br><br>Nie odnaleziono uzytkownika o podanym loginie";
          elseif($_GET['error']==2) echo "<br><br>Złe hasło";
        }
         ?>
      </form>
    </main>
    <footer><br>
      Przykładowe dane do logowania:<br><br>
      uczeń: login piotrcholewa hasło aaa<br>
      uczeń: login kondziumalina hasło aaa<br><br>
      nauczyciel: login kasiaspoko hasło qqq<br>
      nauczyciel: login slawciu hasło aaa<br><br>
      administrator: login admin2 hasło admin<br>
      <br>
      Nazwa bazy danych: dziennik
    </footer>
  </body>
</html>
