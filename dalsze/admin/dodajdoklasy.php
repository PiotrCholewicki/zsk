<?php
  require_once("crudnauczyciel.php");
  $connect = new mysqli("localhost","root","","dziennik");
  $sql69 = "SELECT id_nauczyciela AS id FROM nauczyciel WHERE login = '$_GET[login]'";
  $result69 = $connect->query($sql69);
  $key69 = $result69->fetch_assoc();
  $id = $key69['id'];
  $sql70 = "insert into `nauczyciel_klasa` VALUES (NULL, '$id', '$_GET[klasa]')";
  $connect->query($sql70);
  header("Location: crudnauczyciel.php");
  $connect->close();
 ?>
