<?php
  require_once("cruduczen.php");
  $connect = new mysqli("localhost","root","","dziennik");
  if(!empty($_GET['imie'])){
    $sql = "UPDATE `uczen` SET `imie` = '$_GET[imie]' WHERE login = '$_GET[getlogin]'";
    $connect->query($sql);
  }
  if(!empty($_GET['nazwisko'])){
    $sql = "UPDATE `uczen` SET `nazwisko` = '$_GET[nazwisko]' WHERE login = '$_GET[getlogin]'";
    $connect->query($sql);
  }
  if(!empty($_GET['klasa'])){
    $sql = "UPDATE `uczen` SET `id_klasy` = '$_GET[klasa]' WHERE login = '$_GET[getlogin]'";
    $connect->query($sql);
  }
  if(!empty($_GET['login'])){
    $sql = "UPDATE `uczen` SET `login` = '$_GET[login]' WHERE login = '$_GET[getlogin]'";
    $connect->query($sql);
  }
  if(!empty($_GET['haslo'])){
    $password_hashed = password_hash($_GET['haslo'], PASSWORD_ARGON2I);
    $sql = "UPDATE `uczen` SET `haslo` = '$password_hashed' WHERE login = '$_GET[getlogin]'";
    $connect->query($sql);
  }
 ?>
