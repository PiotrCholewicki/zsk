<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wynik</title>
  </head>
  <body>
    <?php
    $sum = $_POST['distance'];
    if(isset($_POST['luggage']))
    {
      $sum+=20;
    }
    switch ($_POST['discount']) {
      case 'student':
        $sum*=0.5;
        break;

      case 'kid':
        $sum*=0.33;
        break;

    case 'disabled':
    $sum*= 0;
  }
    echo $sum;
     ?>
  </body>
</html>
