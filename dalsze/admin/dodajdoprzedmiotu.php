<?php
  require_once("crudnauczyciel.php");
  $connect = new mysqli("localhost","root","","dziennik");
  $sqla = "SELECT id_nauczyciela AS id FROM nauczyciel WHERE login = '$_GET[login]'";
  $resulta = $connect->query($sqla);
  $keya = $resulta->fetch_assoc();
  $id = $keya['id'];
  $sqlb = "insert into `nauczyciel_przedmiot` VALUES (NULL, '$id', '$_GET[przedmiot]')";
  $connect->query($sqlb);
  header("Location: crudnauczyciel.php");
  $connect->close();
 ?>
