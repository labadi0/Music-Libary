<?php
include './inc/header.php';
include 'connect.php';

function countproducteur() {
    $db = conectiondb();

    $sql = "SELECT count(*) FROM producteur";
    $result = $db->prepare($sql);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
    return $number_of_rows;
}


function display() {

    $db = conectiondb();


    $x= countproducteur();



    $tab = array();

    $xx = array();


    $j = 1;
    for ($i = 1; $i <= $x; $i++) {


        $xx = extracterProducteur();
        //print_r($x);

        $tab = $xx[$i-1];







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

        $image = 'picture/producteur/'.$path_producteur;



        if ($j == 1 || $j == 5  ){

            echo' <div class="section group">';

            echo '<div class="grid_1_of_4 images_1_of_4"> ';

            /*
             $sql = "SELECT * FROM produit WHERE modele = '$modele'";
             $sth = $db->query($sql);
             $result=mysqli_fetch_array($sth);
             echo  ' <h2>'.$nameMere.'</h2>';
             echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';
             */
             echo '<img src="'.$image.'"'.  ' style = "width : 230px; height :345px;"  />';

            echo ' <form action="previewProducteur.php" method="get"  enctype="multipart/form-data" > ';




            echo ' <p><input style="border:none;text-align: center;" type="text" name="nomModele"value="'.$nom_producteur.'"readonly></p>';
            echo  '<p><span >'.$nom_production.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	           <div ><span>   <input class="btn btn-info" type="submit" name="monurl" value="Details"> </span>	</div> ';
            echo '</form>';

            if ($j==5){
                $j=1;
            }

            echo		'</div>';
            $j++;



        }

        elseif ($j<= 4){

            echo '<div class="grid_1_of_4 images_1_of_4"> ';
            /*
             $sql = "SELECT * FROM produit WHERE modele = '$modele'";
             $sth = $db->query($sql);
             $result=mysqli_fetch_array($sth);
             echo  ' <h2>'.$nameMere.'</h2>';
             echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';
             */
             echo '<img src="'.$image.'"'.  ' style = "width : 230px; height :345px;"  />';


            echo ' <form action="previewProducteur.php" method="get"  enctype="multipart/form-data" > ';


            echo ' <p><input style="border:none;text-align: center;" type="text" name="nomModele"value="'.$nom_producteur.'"readonly></p>';
            echo  '<p><span >'.$nom_production.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	           <div ><span>   <input class="btn btn-info" type="submit" name="monurl" value="Details"> </span>	</div> ';
            echo '</form>';



            echo		'</div>';
            $j++;


        }



        else {
            echo '</div>';
            $j=1;


        }



    }

}



?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3> producteur </h3>
    		</div>
    		<div class="clear"></div>
    	</div>


	       <?php

	       display();

	       ?>


 </div>
 </div>
 </div>
</div>



 <?php include 'inc/footer.php'; ?>
