<?php
  require_once("crudnauczyciel.php");
  $connect = new mysqli("localhost","root","","dziennik");
  $sql = "DELETE nauczyciel_klasa FROM `nauczyciel_klasa` JOIN nauczyciel on nauczyciel_klasa.id_nauczyciela = nauczyciel.id_nauczyciela JOIN klasa on nauczyciel_klasa.id_klasy = klasa.id_klasy WHERE nauczyciel.login = '$_GET[login]' AND klasa.nazwa_klasy = '$_GET[klasa]';  ";
  $result = $connect->query($sql);
 ?>
