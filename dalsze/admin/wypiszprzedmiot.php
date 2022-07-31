<?php
  require_once("crudnauczyciel.php");
  $connect = new mysqli("localhost","root","","dziennik");
  $sql = "DELETE nauczyciel_przedmiot FROM `nauczyciel_przedmiot` JOIN nauczyciel on nauczyciel_przedmiot.id_nauczyciela = nauczyciel.id_nauczyciela
  JOIN przedmiot on nauczyciel_przedmiot.id_przedmiotu = przedmiot.id_przedmiotu
  WHERE nauczyciel.login = '$_GET[login]' AND przedmiot.nazwa_przedmiotu = '$_GET[przedmiot]';";
  $result = $connect->query($sql);
 ?>
