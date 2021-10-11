<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lotnisko</title>
  </head>
  <body>
    <h3>Prosze wypelnic formularz</h3>
    <?php
    if(!isset($_POST['distance']))
    echo<<<L
    <form method="POST">
      <input type="number" name="distance" placeholder="Prosze wprowadzic dystans"><br>
      <input type="checkbox" name="luggage">Bagaż dodatkowy?<br>
      <input type="radio" name="discount" value="student">Studencka<br>
      <input type="radio" name="discount" value="kid">Dziecięca<br>
      <input type="radio" name="discount" value="disabled">Inwalida<br>
      <input type="submit" value="Przeslij">
    </form>
L;
else{
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
  echo<<<L
  <button onclick=getBack()>POWRÓT</button>
  L;
}
 ?>
 <script>
 function getBack(){
   history.back();
 }
 </script>
  </body>
</html>
