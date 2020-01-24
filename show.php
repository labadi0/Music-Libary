<?php
session_start();
include('inc/conx.inc.php');
if(isset($_POST['lien']) && !empty($_POST['lien']) ){

  $lien = $_POST['lien'];
  $sql =$conn->prpare("SELECT * FROM chanson WHERE nom_chanson=?");
  $sql->execute(array($lien));
  $exist=$sql->rowCount();
  if($exist > 0){
    $row = $sql->fetchAll();
    foreach ($row as $key => $value) {
      echo $value['nom_chanson'];
    }

  }
  }
  ?>
