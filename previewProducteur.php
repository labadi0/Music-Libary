<?php


include 'connect.php';

if (isset($_GET['monurl']) ){
    $myUrl = $_GET['nomModele'];


    $tab = array();
    $x = array();
    $x = productionextreaiere($myUrl,"nom_producteur");
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




        $id_producteur  = $tab['id_producteur'];
        $nom_producteur = $tab['nom_producteur'];
        $date_naissance_producteur = $tab['date_naissance_producteur'];
        $adresse_producteur = $tab['adresse_producteur'];
        $style_music_producteur = $tab['style_music_producteur'];
        $experience_producteur = $tab['experience_producteur'];
        $nom_production = $tab['nom_production'];
        $adresse_production = $tab['adresse_production'];
        $capitale_production = $tab['capitale_production'];

        $path_producteur = $tab['path_producteur'];





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
				//	$x = $smp->getModele();
                // $sql = "SELECT * FROM produit WHERE modele = '$x'";
               // $sth = $db->query($sql);
              //  $result=mysqli_fetch_array($sth);
              $image = 'picture/producteur/'.$path_producteur;
               //    echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 300px; height :450px;/>';
               echo '<img src="'.$image.'"'.  ' style = "width : 300px; height :450px;"  />';

//              echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 200px; height :200px;/>';



?>
					</div>
				<div class="desc span_3_of_2">


			</div>
				<div class="product-desc">
	<!--  		$smp = new Produit($nameMere, $description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color);-->

			<h2 style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;'> details du producteur </h2>
			<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'   > <strong> Nom producteur </strong>  : <?php echo $nom_producteur;   ?> </p>
      <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> date de naissance de producteur </strong> : <?php echo $date_naissance_producteur;   ?></p>

	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> Adresse de producteur </strong> : <?php echo $adresse_producteur;   ?>  </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> style musicale de producteur </strong> : <?php echo  $style_music_producteur ; ?> </p>
	       	<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> experiance de producteur </strong> : <?php echo $experience_producteur; ?> Ans </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nom de producteur </strong>  : <?php echo $nom_producteur  ?> </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nom production  </strong>  : <?php echo $nom_production; ?> </p>
	        	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> Adresse de la production   </strong>  : <?php echo $adresse_production; ?> </p>
          <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> capitale production </strong>  : <?php echo $capitale_production; ?> Millard dollards </p>




							<h2 style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;'> albums </h2>


				<?php






				for ($i = 0; $i < count($nomSAlbum); $i++) {

				    $s = stringSet($nomSAlbum[$i]);
				    $f = $i+1;
				  //  echo $f.'-) '. $nomSAlbum[$i];
				    $url =   "http://localhost/bdfinale/V2/musiclibary/previewAlbum.php?nomModele=".$s."&monurl=Details";
				    echo $f.')<a href="'.$url.'">'.$nomSAlbum[$i].'</a>';

				    echo "<br />";
				    /*
				     echo    '<audio controls style = "width :300px;">';
				     echo          '<source src="'.$pathmusicChanson[$i].'"type="audio/mpeg" >';
				     echo   '</audio>';
				     echo '<br />';
				     */

				}





				?>



  </div>

	</div>

 		</div>
 	</div>
	</div>


 <?php include 'inc/footer.php'; ?>
