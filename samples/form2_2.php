<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['surname']))
    {
      if($_POST['race']=='white')
      {
        echo <<< L
        Hej Białasie!<br>
        Twoje imię to: $_POST[name]<br>
        Nazwisko: $_POST[surname]<br>
        Rasa: $_POST[race]
L;
      }
      elseif($_POST['race']=='yellow')
      {
        echo <<< L
        Hej Panie Żółty!<br>
        Twoje imię to: $_POST[name]<br>
        Nazwisko: $_POST[surname]<br>
        Rasa: $_POST[race]
L;
      }
      elseif($_POST['race']=='black')
      {
        echo <<< L
        Hej Panie Czarny!<br>
        Twoje imię to: $_POST[name]<br>
        Nazwisko: $_POST[surname]<br>
        Rasa: $_POST[race]
L;
      }

}
    else
    {
      echo "WYPIERDALAJ WYPEŁNIĆ DANE";
    }
     ?>
    <main>
      <button onclick="goBack()">Powróć<buton>
        <script>
        function goBack()
        {
          history.back();
        }

        </script>
    </main>
  </body>
</html>
