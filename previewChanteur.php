<?php


include 'connect.php';

if (isset($_GET['monurl']) ){
    $myUrl = $_GET['nomModele'];


    $tab = array();
    $x = array();
   // $x = productionextreaiere($myUrl,"nom_chanteur");
    $x =  extracterChanteurInfo($myUrl,"nom_chanteur");
    $nomSAlbum = array();
    // $pathmusicChanson = array();
    //  $nomSchanteur  = array();

    for ($i = 0; $i < count($x); $i++) {
        $tab = $x[$i];

        //print_r($x);
        //$tab = $x[0];








        $id_album  = $tab['id_album'];
        $titre_album = $tab['titre_album'];
        $description_album = $tab['description_album'];
        $budget_album = $tab['budget_album'];
        $nombre_participant_album = $tab['nombre_participant_album'];
        $langue_album = $tab['langue_album'];
        $id_producteur_album = $tab['id_producteur_album'];
        $path_image_album = $tab['path_image_album'];


        $id_chanteur  = $tab['id_chanteur'];
        $nom_chanteur = $tab['nom_chanteur'];
        $prenom_chanteur = $tab['prenom_chanteur'];
        $style_music_chanteur = $tab['style_music_chanteur'];
        $date_naissance_chanteur = $tab['date_naissance_chanteur'];
        $anne_activite = $tab['anne_activite'];
        $nom_artistique_chanteur = $tab['nom_artistique_chanteur'];

        $path_chanteur = $tab ['path_chanteur'];

        $image = 'picture/chanteur/'.$path_chanteur;






        array_push($nomSAlbum,$titre_album);
        //array_push($pathmusicChanson,$path_music_chanson);
        //  array_push($nomSchanteur,$nom_artistique_chanteur);


    }

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
          $image = 'picture/chanteur/'.$path_chanteur;

				//	$x = $smp->getModele();
                // $sql = "SELECT * FROM produit WHERE modele = '$x'";
               // $sth = $db->query($sql);
              //  $result=mysqli_fetch_array($sth);
				//	$image = 'picture/'.$path_image_album;
               //    echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 300px; height :450px;/>';
					echo '<img src="'.$image.'"'.  ' style = "width : 300px; height :450px;"  />';

//              echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 200px; height :200px;/>';



?>
					</div>
				<div class="desc span_3_of_2">


			</div>
				<div class="product-desc">
	<!--  		$smp = new Produit($nameMere, $description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color);-->

			<h2 style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;'> details du chanteur </h2>
			<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'   > <strong> Nom artistique chanteur </strong>  : <?php echo $nom_artistique_chanteur;   ?> </p>
      <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> Nom officiel de chanteur </strong> : <?php echo $nom_chanteur;   ?></p>

	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> Prenom officiel de chanteur </strong> : <?php echo $prenom_chanteur;   ?>  </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> date de naissance de chanteur  </strong> : <?php echo  $date_naissance_chanteur ; ?> </p>
	       	<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> date de debut de cariere de chanteur </strong> : <?php echo $anne_activite ?>  </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> style musicale de chanteur  </strong>  : <?php echo $style_music_chanteur  ?> </p>





							<h2 style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;'> albums </h2>


				<?php

				for ($i = 0; $i < count($nomSAlbum); $i++) {

				    $s = stringSet($nomSAlbum[$i]);
				    $f = $i+1;
				  //  echo $f.'-) '. $nomSAlbum[$i];
				    $url =   "http://localhost/bdfinale/V2/musiclibary/previewAlbum.php?nomModele=".$s."&monurl=Details";
				    echo $f.')<a href="'.$url.'">'.$nomSAlbum[$i].'</a>';

				    echo "<br />";
				}





				?>



  </div>

	</div>

 		</div>
 	</div>
	</div>


 <?php include 'inc/footer.php'; ?>
