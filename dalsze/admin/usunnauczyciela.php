<?php
  require_once("cruduczen.php");
  $connect = new mysqli("localhost","root","","dziennik");
  $sql = "DELETE FROM `nauczyciel` WHERE `nauczyciel`.`login` = '$_GET[login]'";
  $result = $connect->query($sql);
 ?>
