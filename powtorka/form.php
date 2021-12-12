<?php
  require_once 'connect.php';
  if(isset($_POST['name']))
  {
    $sql = "UPDATE `studenci` SET Imie='$_POST[name]', nazwisko = '$_POST[surname]',id_obywatelstwa = $_POST[citizenship]  WHERE `id_person` = '$_GET[id_update]'";
    $result = $connect->query($sql);
  }
    echo <<< FORM
    <form method = "post">
      <input type = "text" name = "name" placeholder = "Podaj imię">
      <input type = "text" name = "surname" placeholder = "Podaj nazwisko">
      <input type = "number" name = "citizenship" placeholder = "Podaj obywatelstwo">
      <input type = "submit" value = "Prześlij">
    </form>
    <a href = "table.php">Przejdź do tabeli se</table>
  FORM;
 ?>
