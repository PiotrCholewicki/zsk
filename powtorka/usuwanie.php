<?php
    require_once 'connect.php';
    $sql = "DELETE FROM `studenci` WHERE `studenci`.`id_person` = '$_GET[id_delete]'";
    $connect->query($sql);
    echo "<a href='table.php'>Wróć</a>";
?>
