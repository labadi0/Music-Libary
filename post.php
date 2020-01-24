<?php

include('inc/conx.inc.php');

if(isset($_POST['search']) && !empty($_POST['search'])){
  $search = $_POST['search'];
  $sql=$conn->prepare("SELECT * FROM chanson WHERE nom_chanson LIKE ?");
  $sql->execute(array("$search%"));
  $row = $sql->fetchAll();
  foreach ($row as $key => $value) {
    echo "<li><a href='preview.php?nomModele=".$value['nom_chanson']."&monurl=Details'>".$value['nom_chanson']."</a></li>";
  }
}
 ?>
