<?php
  require_once 'crudnauczyciel.php';
  $connect = new mysqli("localhost","root","","dziennik");
  $sql = "SELECT id_nauczyciela AS id FROM nauczyciel WHERE login = '$_GET[getlogin]'";
  $result = $connect->query($sql);
  $key = $result->fetch_assoc();
  echo $key;
  $id = $key['id'];
  $sql2 = "insert into `nauczyciel_klasa` VALUES (NULL, '$id', '$_GET[iKlasa]')";
  $connect->query($sql2);
 ?>
