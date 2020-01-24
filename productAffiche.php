<?php

//include 'Produit.php';
include './inc/header.php';
include 'connect.php';



function display() {

    $db = conectiondb();


    $x= counter();



    $tab = array();

    $xx = array();


    $j = 1;
    for ($i = 1; $i <= $x; $i++) {


        $xx = extracter2($i,"id_chanson");
        //print_r($x);
        $tab = $xx[0];


        $id_chanson = $tab['id_chanson'] ;
        $nom_chanson = $tab['nom_chanson'];
        $style_chanson = $tab['style_chanson'];
        $duree_chanson = $tab['duree_chanson'];
        $date_ajoute_chanson = $tab['date_ajoute_chanson'];
       // $image_chanson = $tab['image_chanson'];

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
        $image_album = $tab['path_image_album'];
        $id_producteur_album = $tab['id_producteur_album'];


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







        //echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 200px; height :200px;/>';


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
              echo '<img src="images/music.png" alt="s" >';

            echo ' <form action="preview.php" method="get"  enctype="multipart/form-data" > ';




            echo ' <p><input style="border:none;text-align: center;" type="text" name="nomModele"value="'.$nom_chanson.'"readonly></p>';
            echo  '<p><span class="price">'.$nom_artistique_chanteur.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>
 ';
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
            echo '<img src="images/music.png" alt="s" >';

            echo ' <form action="preview.php" method="get"  enctype="multipart/form-data" > ';


            echo ' <p><input style="border:none ;text-align: center;" type="text" name="nomModele"value="'.$nom_chanson.'"readonly></p>';
            echo  '<p><span class="price">'.$nom_artistique_chanteur.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>';
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

//-----------------------------------------------------------------------------------------------------------------------------------
function displaySpecial($style) {

    $db = conectiondb();


    $x= counterStyle($style);
// hna pour pop y9oul 1


    $tab = array();

    $xx = array();

    $f = array();
    $j = 1;
    for ($i = 1; $i <= $x; $i++) {
// tarekkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk rana hna
    $f = selector_id_dector ($style);

        $xx = extracterSryle($f[$i-1],"id_chanson",$style);
    //    var_dump($xx);
        $tab = $xx[0];


        $id_chanson = $tab['id_chanson'] ;
        $nom_chanson = $tab['nom_chanson'];
        $style_chanson = $tab['style_chanson'];
        $duree_chanson = $tab['duree_chanson'];
        $date_ajoute_chanson = $tab['date_ajoute_chanson'];
       // $image_chanson = $tab['image_chanson'];

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
        $image_album = $tab['path_image_album'];
        $id_producteur_album = $tab['id_producteur_album'];


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







        //echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"  style = "width : 200px; height :200px;/>';


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
              echo '<img src="images/music.png" alt="s" >';

            echo ' <form action="preview.php" method="get"  enctype="multipart/form-data" > ';




            echo ' <p><input style="border:none;text-align: center;" type="text" name="nomModele"value="'.$nom_chanson.'"readonly></p>';
            echo  '<p><span class="price">'.$nom_artistique_chanteur.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	<div class="details"><span>   <input type="submit" name="monurl" value="Details"> </span>	</div> ';
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
            echo '<img src="images/music.png" alt="s" >';

            echo ' <form action="preview.php" method="get"  enctype="multipart/form-data" > ';


            echo ' <p><input style="border:none ;text-align: center;" type="text" name="nomModele"value="'.$nom_chanson.'"readonly></p>';
            echo  '<p><span class="price">'.$nom_artistique_chanteur.'</span></p>';
            //	<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
            echo '	<div class="details"><span>   <input type="submit" name="monurl" value="Details"> </span>	</div> ';
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
       <h3>chansons</h3>
       </div>

       <div class="clear"></div>

     </div>
     <form action="" method="post">
         <select name="select1">
        <option value="all" > all </option>
            <!--      <option value="rap"> rap</option>
             <option value="pop"> pop</option>   -->
             <?php
             $tab  = array();
             $tab =  all_style();
             for ($i=0; $i < count($tab); $i++) {
               echo '<option value="'.$tab[$i].'">'.$tab[$i].'</option>';
             }


              ?>
         </select>
         <input type="submit" name="submit" value="Go"/>
     </form>


     <?php
   if(isset($_POST['select1'])){
    $select1 = $_POST['select1'];

    if ($select1 == 'all'){
        display();
    }
    else {
      $tab  = array();
      $tab =  all_style();
      for ($i = 0; $i < count($tab); $i++) {
          if ($select1 ==  $tab[$i]){
            displaySpecial($select1);


          }
      }


    }
   /*
    switch ($select1) {
        case 'all':
            display();

            break;



        case 'rap':
            displaySpecial('rap');
            break;
            case 'pop':
            displaySpecial('pop');
                break;
        default:

            break;
    }
    */
   }
   else {

   display();



   }
   ?>





        <?php

      //  display();


        ?>



   </div>
   </div>
   </div>
   </div>
   </div>



   <?php include 'inc/footer.php'; ?>
