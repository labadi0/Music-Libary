<?php
include './inc/header.php';
include 'connect.php';

/*
function countAlbum() {
    $db = conectiondb();

    $sql = "SELECT count(*) FROM album";
    $result = $db->prepare($sql);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
    return $number_of_rows;
}

*/
function display() {

    $db = conectiondb();


    $x= countAlbum();



    $tab = array();

    $xx = array();


    $j = 1;
    for ($i = 1; $i <= $x; $i++) {


        $xx = extracterAlbum();
        //print_r($x);

            $tab = $xx[$i-1];




        $id_album  = $tab['id_album'];
        $titre_album = $tab['titre_album'];
        $description_album = $tab['description_album'];
        $budget_album = $tab['budget_album'];
        $nombre_participant_album = $tab['nombre_participant_album'];
        $langue_album = $tab['langue_album'];
        // $image_album = $tab['image_album'];
        $id_producteur_album = $tab['id_producteur_album'];
        $path_image_album = $tab['path_image_album'];
        $image = 'picture/'.$path_image_album;




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

            echo ' <form action="previewAlbum.php" method="get"  enctype="multipart/form-data" > ';


            echo ' <p><input style="border:none ;text-align: center;" type="text" name="nomModele"value="'.$titre_album.'"readonly></p>';
            echo  '<p><span style="border:none ;text-align: center;">'.$description_album.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	           <div ><span>   <input class="btn btn-success" type="submit" name="monurl" value="Details"> </span>	</div> ';
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


            echo ' <form action="previewAlbum.php" method="get"  enctype="multipart/form-data" > ';


            echo ' <p><input style="border:none ;text-align: center;" type="text" name="nomModele"value="'.$titre_album.'"readonly></p>';
            echo  '<p><span style="border:none ;text-align: center;" >'.$description_album.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	           <div ><span>   <input class="btn btn-success" type="submit" name="monurl" value="Details"> </span>	</div> ';
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
    		<h3> nouvelle albums </h3>
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
