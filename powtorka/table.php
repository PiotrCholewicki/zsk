<?php
  require_once 'connect.php';
  $sql = "SELECT * FROM `studenci`";
  $result = $connect->query($sql);
  echo "<table>";
  while($key = $result->fetch_assoc()){
    echo <<< LABEL
      <tr>
        <td>$key[id_person]</td>
        <td>$key[Imie]</td>
        <td>$key[nazwisko]</td>
        <td>$key[id_obywatelstwa]</td>
        <td><a href = "form.php?id_update=$key[id_person]">Przejdź do update</a></td>
        <td><a href = "usuwanie.php?id_delete=$key[id_person]">Skasuj</a></td>
      </tr>
LABEL;
  }
  echo "</table>";
  echo "<a href='wstawianie.php'>DO INSERTA</a>";
 ?>
