<?php
  require_once 'connect.php';
  if(isset($_POST['name']))
  {
    $sql = "INSERT INTO `studenci` (`id_person`, `Imie`, `nazwisko`, `id_obywatelstwa`) VALUES ('$_POST[id]','$_POST[name]','$_POST[surname]','$_POST[citizenship]'); ";
    $result = $connect->query($sql);
  }
    echo <<< FORM
    <form method = "post">
      <input type = "text" name = "id" placeholder = "Podaj id">
      <input type = "text" name = "name" placeholder = "Podaj imię">
      <input type = "text" name = "surname" placeholder = "Podaj nazwisko">
      <input type = "number" name = "citizenship" placeholder = "Podaj obywatelstwo">
      <input type = "submit" value = "Prześlij">
    </form>
    <a href = "table.php">Przejdź do tabeli se</table>
  FORM;
 ?>
