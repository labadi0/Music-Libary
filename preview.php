<?php

include_once'inc/conx.inc.php';

include 'connect.php';

if (isset($_GET['monurl']) ){
    $myUrl = $_GET['nomModele'];


    $tab = array();
    $x = array();
    $x = extracter($myUrl,"nom_chanson");
    //print_r($x);
    $tab = $x[0];


    $id_chanson = $tab['id_chanson'] ;
    $nom_chanson = $tab['nom_chanson'];
    $style_chanson = $tab['style_chanson'];
    $duree_chanson = $tab['duree_chanson'];
    $date_ajoute_chanson = $tab['date_ajoute_chanson'];
    $path_music_chanson = $tab['path_music_chanson'];




    $id_chanteur  = $tab['id_chanteur'];
    $nom_chanteur = $tab['nom_chanteur'];
    $prenom_chanteur = $tab['prenom_chanteur'];
    $style_music_chanteur = $tab['style_music_chanteur'];
    $date_naissance_chanteur = $tab['date_naissance_chanteur'];
    $anne_activite = $tab['anne_activite'];
    $nom_artistique_chanteur = $tab['nom_artistique_chanteur'];

    $id_chanter_chanteur = $tab['id_chanter_chanteur'];
    $id_chanter_chanson = $tab['id_chanter_chanson'];


    $id_album  = $tab['id_album'];
    $titre_album = $tab['titre_album'];
    $description_album = $tab['description_album'];
    $budget_album = $tab['budget_album'];
    $nombre_participant_album = $tab['nombre_participant_album'];
    $langue_album = $tab['langue_album'];
    $id_producteur_album = $tab['id_producteur_album'];
    $path_image_album = $tab['path_image_album'];



    $id_chansalbum_chanson = $tab['id_chansalbum_chanson'];
    $id_chansalbum_album = $tab['id_chansalbum_album'];


    $id_producteur  = $tab['id_producteur'];
    $nom_producteur = $tab['nom_producteur'];
    $date_naissance_producteur = $tab['date_naissance_producteur'];
    $adresse_producteur = $tab['adresse_producteur'];
    $style_music_producteur = $tab['style_music_producteur'];
    $experience_producteur = $tab['experience_producteur'];
    $nom_production = $tab['nom_production'];
    $adresse_production = $tab['adresse_production'];
    $capitale_production = $tab['capitale_production'];





 //   $smp = new Produit($nameMere, $description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color,$image,$name,$image2,$name2);

    //($nameMere,$description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color);

}

?>

			<?php
                include 'inc/header.php';
            ?>


					<div class="main">
					<div class="content">
					<div class="section group">
					<div class="cont-desc span_1_of_2">
					<div class="grid images_3_of_2">


					<?php


					$db = conectiondb();
				//	$x = $smp->getModele();
                // $sql = "SELECT * FROM produit WHERE modele = '$x'";
               // $sth = $db->query($sql);
              //  $result=mysqli_fetch_array($sth);
					$image = 'picture/'.$path_image_album;
               //    echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 300px; height :450px;/>';
					echo '<img src="'.$image.'"'.  ' style = "width : 300px; height :450px;"  />';

//              echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 200px; height :200px;/>';
                        echo '<br />';


                     echo    '<audio controls style = "width :300px;">';

                     echo          '<source src="'.  $path_music_chanson   .'"type="audio/mpeg" >';

                      echo   '</audio>';


?>
					</div>
				<div class="desc span_3_of_2">
					<h2  style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;' ><?php echo $nom_artistique_chanteur."_".$nom_chanson."(Official Audio)";?></h2>


			</div>
				<div class="product-desc">
	<!--  		$smp = new Produit($nameMere, $description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color);-->

			<h2 style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;'> details de la chanson </h2>
			<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'   > <strong> chanson </strong>  : <?php  echo $nom_chanson ; ?></p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> album </strong> : <?php echo $titre_album ;   ?></p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nom chanteur </strong> : <?php echo $nom_artistique_chanteur;   ?></p>
	       	<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> style chanson </strong> : <?php echo $style_chanson ;   ?></p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> date creation la chanson </strong>  : <?php   echo $date_ajoute_chanson ; ?></p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> duree de la chanson </strong> : <?php echo $duree_chanson;?> min</p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nom producteur </strong>  : <?php echo $nom_producteur ;   ?></p>



  </div>
  <?php
  if(isset($_POST['submit5'])){
    $commentaire=$_POST['comment'];
    $date = date('Y-m-d');
    $iduser = $_SESSION['id_utilisateur'];
    $idchanson = $id_chanson;


    $sql=$conn->prepare("INSERT INTO avis(id_avis_chanson, id_avis_no_util_cli, date_avis, commentaire) VALUES(?,?,?,?)");
    $sql->execute(array($idchanson, $iduser, $date, $commentaire));

    $error = $sql->errorInfo();

   //   print_r($error);

    //echo $idchanson;

    }







  if(isset($_SESSION['id_utilisateur'])){

echo  '<div id="form">
  <form id="comment_form" action="" method="POST">

    <div>

      <textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>

    </div>

    <div>

      <input class = "btn btn-primary" type="submit" name="submit5" value="Add Comment">

    </div>


  </form>
</div>';
}
?>
<div id="showcomment">

  <details>
<summary>Les commentaires</summary>
<?php
  /*debut des requetes**/
  $sql=$conn->prepare("SELECT * FROM avis WHERE id_avis_chanson=?");
  $sql->execute(array($id_chanson));

  //le resultat est stocker dans le tableau resultat
  if($sql) {
      $resultat = $sql->fetchAll();
      foreach ($resultat as $key => $variable) {
        $sql1=$conn->prepare("SELECT * FROM utilisateur WHERE id_utilisateur=?");
        //print_r($variable);
        $iduser=$variable['id_avis_no_util_cli'];
        $sql1->execute(array($iduser));
        $resultat2 = $sql1->fetchAll();
        foreach ($resultat2 as $key1 => $value) {
           $nameuser = $value['nom_utilisateur'];
        }

          echo " <div class='avis'>
                    <div class='auteur'>Publié par ". $nameuser." le ".$variable['date_avis']." </div>
                    <div class='commentaire'> <p> ".$variable['commentaire']." </p> </div>
                 </div>";
      }
  }
?>
</details>


</div>
	</div>

 		</div>
 	</div>
	</div>


 <?php include 'inc/footer.php'; ?>
