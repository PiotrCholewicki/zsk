<?php
  $connect = new mysqli("localhost","root","","dziennik");
  $login = $_POST['login'];
  $password = $_POST['password'];
  $select = $_POST['select'];
  if (isset($login)&&isset($password)&&isset($select)) {
    if ($select == 1) {
      $sql = "SELECT login FROM uczen WHERE login='$login'";
      $result=$connect->query($sql);
      $numlogin = $result->num_rows;
      echo "$numlogin i $password";
      if($numlogin>0){
        //Użtytkownik o podanym loginie istnieje w bazie
        $sql = "SELECT login,haslo FROM uczen WHERE login='$login'";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        if(password_verify($password, $row['haslo']))
        {
          session_start();
          $_SESSION['user']=$login;
          header("Location: uczen/uczenindex.php?");
        }
        else header("Location: ../login.php?error=2");
      }
      else header("Location: ../login.php?error=1");
    }
    if ($select == 2) {
      $sql = "SELECT login FROM nauczyciel WHERE login='$login'";
      $result=$connect->query($sql);
      $numlogin = $result->num_rows;

      /*$password_hashed = password_hash($password, PASSWORD_ARGON2I);
      echo $password_hashed;*/
      if($numlogin>0){
        //Nauczyciel o podanym loginie istnieje w bazie
        $sql = "SELECT login,haslo FROM nauczyciel WHERE login='$login'";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        if(password_verify($password, $row['haslo']))
        {
          session_start();
          $_SESSION['teacher']=$login;
          header("Location: nauczyciel/nauczycielindex.php");
        }
        else header("Location: ../login.php?error=2");
      }

      else header("Location: ../login.php?error=1");
    }
    if ($select == 3) {
      $sql = "SELECT login FROM admin WHERE login='$login'";
      $result=$connect->query($sql);
      $numlogin = $result->num_rows;
      /*$password_hashed = password_hash($password, PASSWORD_ARGON2I);
      echo $password_hashed;*/
      if($numlogin>0){
        //Użtytkownik o podanym loginie istnieje w bazie
        $sql = "SELECT login,haslo FROM admin WHERE login='$login'";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        if(password_verify($password, $row['haslo']))
        {
          header("Location: admin/adminindex.php?");
        }
        else header("Location: ../login.php?error=2");
      }
      else header("Location: ../login.php?error=1");
    }
    $connect->close();
  }
  else header("Location: ../login.php")


?>
