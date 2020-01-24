<?php
include_once'../inc/conx.inc.php';
include_once'header1.php';

$sql=$conn->prepare("SELECT * from avis");
$sql->execute(array());
  if($sql){
    $resultat=$sql->fetchAll();
    echo '<div style="overflow-y: scroll; height:255px; margin: 0 auto; width=100px; position: absolute;top: 30%; left: 30%;">';
    echo '<table>';
    echo '<tr><th style="TEXT-ALIGN: center;">Commentaire</th><th style="TEXT-ALIGN: center;">Utilisateur</th></tr>';
    foreach ($resultat as $key => $value) {
      $sql1=$conn->prepare("SELECT nom_utilisateur FROM utilisateur WHERE id_utilisateur=?");
      $iduser=$value['id_avis_no_util_cli'];
      $sql1->execute(array($iduser));
      $resultat2 = $sql1->fetchAll();
;
      foreach ($resultat2 as $key1 => $value1) {
         $nameuser = $value1['nom_utilisateur'];

      ?>

      <form class="delete-form" action="" method="POST">
        <tr>
    <td style="padding: 10px;"><input style="TEXT-ALIGN: center;" type="hiden" name="commentaire" value="<?php echo $value['commentaire']; ?>" readonly></td>
    <td style="padding: 10px;"><input style="TEXT-ALIGN: center;"type="hiden" name="user" value="<?php echo $nameuser; ?>" readonly></td>
    <td style="padding: 10px;"><button style="TEXT-ALIGN: center;"class = "btn btn-primary" type="submit" name="delete" style=" margin-top: -20px; margin-left: 346px;" readonly>Suprimmer</button></td>
    </tr>
    </form>


      <?php
      }

    }
    echo '</table>';
    echo '</div >';
  }
    if(isset($_POST['delete'])){

      $commentaire=$_POST['commentaire'];
      $nom_utilisateur=$_POST['user'];
      $sql2=$conn->prepare("DELETE FROM avis WHERE commentaire=?");
      $sql2->execute(array($commentaire));
      if($sql2){
        ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
        <?php
        echo $commentaire.' '.'est suprimer';

        echo '</div>';

      }else {
        ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
        <?php
        echo 'Echec de suppression';

        echo '</div>';

      }


    }
    ?>
