<?php


include 'connect.php';

if (isset($_GET['monurl']) ){
    $myUrl = $_GET['nomModele'];
$nombre = 0;

    $tab = array();
    $x = array();
    $x = extracterAlbumInfo($myUrl);
    $nomSChanson = array();
    $pathmusicChanson = array();
    $nomSchanteur  = array();

    for ($i = 0; $i < count($x); $i++) {
        $tab = $x[$i];

        //print_r($x);
        //$tab = $x[0];


        $nom_chanson = $tab['nom_chanson'];
        $path_music_chanson = $tab['path_music_chanson'];




        $nom_artistique_chanteur = $tab['nom_artistique_chanteur'];

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

                $number_of_songs =  nombre_chanson_album($id_album);

                $nombre = $number_of_songs ;
        array_push($nomSChanson,$nom_chanson);
        array_push($pathmusicChanson,$path_music_chanson);
        array_push($nomSchanteur,$nom_artistique_chanteur);


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
					$image = 'picture/'.$path_image_album;
               //    echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 300px; height :450px;/>';
					echo '<img src="'.$image.'"'.  ' style = "width : 300px; height :450px;"  />';

//              echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 200px; height :200px;/>';
                        echo '<br />';
                        echo '<br />';
                        echo '<br />';

                        for ($i = 0; $i < count($pathmusicChanson); $i++) {
                            $f = $i +1;
                            echo $f.'-) '. $nomSChanson[$i];
                            echo "<br />";
                     echo    '<audio controls style = "width :300px;">';
                     echo          '<source src="'.$pathmusicChanson[$i].'"type="audio/mpeg" >';
                      echo   '</audio>';
                      echo '<br />';


                        }

?>
					</div>
				<div class="desc span_3_of_2">
			<!--		<h2  style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;' ><?php echo $nom_artistique_chanteur."_".$nom_chanson."(Official Audio)";?></h2>  -->


			</div>
				<div class="product-desc">
	<!--  		$smp = new Produit($nameMere, $description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color);-->

			<h2 style = 'font-family: "Arial Black", Gadget, sans-serif;text-transform: uppercase;'> details de l'album </h2>
			<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'   > <strong> Nom Album </strong>  : <?php echo $titre_album;   ?> </p>
      <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> description album </strong> : <?php echo $description_album;   ?></p>
      <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nombre des chansons </strong> : <?php echo $nombre;   ?></p>

	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> Budget Album </strong> : <?php echo $budget_album;   ?> Millions dollards </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nombre de particiapant de l'album </strong> : <?php echo  $nombre_participant_album ; ?> </p>
	       	<p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;' > <strong> langue </strong> : <?php echo $langue_album; ?> </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nom de producteur </strong>  : <?php echo $nom_producteur  ?> </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> experience producteur </strong> : <?php echo $experience_producteur; ?> </p>
	        <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> nom production </strong>  : <?php echo $nom_production; ?> </p>
          <p style = 'margin-left: 20px;font-family: "Courier New", Courier, monospace;   font-size: 18px;  text-transform: uppercase;'> <strong> capitale production </strong>  : <?php echo $capitale_production; ?> Millard dollards </p>




  </div>

	</div>

 		</div>
 	</div>
	</div>


 <?php include 'inc/footer.php'; ?>
