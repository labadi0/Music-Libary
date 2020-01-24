<?php

include 'connect.php';




$db  = conectiondb();

// inserer une image dans une base de donnes

if (isset($_POST['submit'])) {

  //ini_set('upload-max-filesize', '90M');
  //ini_set('post_max_size', '90M');





  /* --------------------------------------------------        producteur             ----------------------------------------------------------------------------------------- */



        $img = $_FILES['path_producteur']['name'];
        $nom_producteur = $_POST['nom_producteur'];
        $date_naissance_producteur = $_POST['date_naissance_producteur'];
        $adresse_producteur = $_POST['adresse_producteur'];
        $style_music_producteur = $_POST['style_music_producteur'];
        $experience_producteur = $_POST['experience_producteur'];
        $nom_production = $_POST['nom_production'];
        $adresse_production = $_POST['adresse_production'];
        $capitale_production = $_POST['capitale_production'];
        $path = $img;









$tab_name_producteur =  array ();

$tab_name_producteur = nom_producteurs ();

if (!in_array($nom_producteur, $tab_name_producteur)){
      //  $name = $_FILES['imagefile']['name'];
      $sql = $db->prepare("INSERT INTO producteur ( nom_producteur, date_naissance_producteur,
        adresse_producteur, style_music_producteur, experience_producteur, nom_production, adresse_production , capitale_production , path_producteur) VALUES(?,?,?,?,?,?,?,?,?)");

        if ($sql->execute(array($nom_producteur,$date_naissance_producteur,$adresse_producteur,$style_music_producteur,$experience_producteur,$nom_production,$adresse_production,$capitale_production,$path))) {
    // Query succeeded
    move_uploaded_file($_FILES['path_producteur']['tmp_name'], "picture/producteur/$img");
    echo "gooooooooooood for producteur";
    echo "<br/>";

} else {
    // Query failed.
    echo "noooooooooooooooo error i cant send to data base for producteur  ";
    echo "<br/>";
}


}
else {

  echo "producteur exist ";
  echo "<br/>";
}

/* --------------------------------------------------        album             ----------------------------------------------------------------------------------------- */



$tab_titre_producteur = array();

$tab_titre_producteur = titre_album();



$img_album = $_FILES['path_image_album']['name'];

$titre_album = $_POST['titre_album'];

$description_album = $_POST['description_album'];


$budget_album = $_POST['budget_album'];

$nombre_participant_album = $_POST['nombre_participant_album'];

$langue_album = $_POST['langue_album'];

$path_album = $img_album;




if (is_numeric($budget_album) == false){
  echo "error";
}
if (is_numeric($nombre_participant_album) == false){
  echo "error";
}
if (is_numeric($langue_album)  == true  ){
  echo "error";
}








if (!in_array($titre_album, $tab_titre_producteur)){


//khasni id producteur doka
$x = array ();
$x =  select_id_producteur ($nom_producteur);
$id_producteur_album =   $x[0]['id_producteur'] ;


$dbb  = conectiondb();


$sqll = $dbb->prepare("INSERT INTO album  ( titre_album, description_album,budget_album, nombre_participant_album, langue_album, id_producteur_album, path_image_album ) VALUES(?,?,?,?,?,?,?)");

  if ($sqll->execute(array($titre_album,$description_album,$budget_album,$nombre_participant_album,$langue_album,$id_producteur_album,$path_album))) {
// Query succeeded
move_uploaded_file($_FILES['path_image_album']['tmp_name'], "picture/$img_album");
echo "gooooooooooood for album";
echo "<br/>";

} else {
// Query failed.
echo "noooooooooooooooo error i cant send to data base for album  ";
echo "<br/>";
}


}
else {


  echo "album exist dans la base ";
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        /* --------------------------------------------------         chanteur            ----------------------------------------------------------------------------------------- */


$tab_nom_artistique_chanteur = array();
$tab_nom_artistique_chanteur = nom_artistique();





$nom_chanteur =  $_POST['nom_chanteur'];

$prenom_chanteur =  $_POST['prenom_chanteur'];

$style_music_chanteur =  $_POST['style_music_chanteur'];

$date_naissance_chanteur =  $_POST['date_naissance_chanteur'];

$anne_activite =  $_POST['anne_activite'];

$nom_artistique_chanteur =  $_POST['nom_artistique_chanteur'];





if (is_numeric($anne_activite) == false){
  echo "error";
}
if (is_numeric($nombre_participant_album) == false){
  echo "error";
}
if (is_numeric($style_music_chanteur)  == true  ){
  echo "error";
}












//$path_chanteur = $_FILES['path_chanteur']['name'];

$put_chanteur = false;

$img_chanteur = $_FILES['path_chanteur']['name'];
if (!in_array($nom_artistique_chanteur, $tab_nom_artistique_chanteur)){


$dbbb = conectiondb();

$sqlll = $dbbb->prepare("INSERT INTO chanteur  ( nom_chanteur, prenom_chanteur,
  style_music_chanteur, date_naissance_chanteur, anne_activite, nom_artistique_chanteur, path_chanteur ) VALUES(?,?,?,?,?,?,?)");

  if ($sqlll->execute(array($nom_chanteur,$prenom_chanteur,$style_music_chanteur,$date_naissance_chanteur,$anne_activite,$nom_artistique_chanteur,$img_chanteur))) {
// Query succeeded
  if ( move_uploaded_file($_FILES['path_chanteur']['tmp_name'], "picture/chanteur/$img_chanteur") == 'true'){
echo "  enfiiiinnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn ";
$put_chanteur = true;
echo "<br/>";
}
else {
  echo "nooooooooooooooooooooooooooooooooooooooooo dossier ";
    echo "Not uploaded because of error #".$_FILES["path_chanteur"]["error"];
}
echo "je suis dans la base ";
} else {
// Query failed.
echo "noooooooooooooooo error i cant send to data base for chanteur  ";
echo "<br/>";
}

} else {

  echo "chanteur exist ";
  $put_chanteur = true;

}


//--------------------------------------------------------------------------------------- chanson ------------------------------------------------------------------

$put_song = false;
$nom_chanson =  $_POST['nom_chanson'];
$style_chanson =  $_POST['style_chanson'];
$duree_chanson =  $_POST['duree_chanson'];
$date_ajoute_chanson =  $_POST['date_ajoute_chanson'];



if (is_numeric($nom_chanson) == true){
  echo "error";
}
if (is_numeric($style_chanson) == true){
  echo "error";
}
if (is_numeric($duree_chanson)  == false  ){
  echo "error";
}





















$msc = $_FILES['path_music_chanson']['name'];

$path_music = "music/".$msc;
$dbq = conectiondb();
//  $name = $_FILES['imagefile']['name'];
$sqldb = $dbq->prepare("INSERT INTO chanson  ( nom_chanson, style_chanson,
  duree_chanson, date_ajoute_chanson, path_music_chanson) VALUES(?,?,?,?,?)");

  if ($sqldb->execute(array($nom_chanson,$style_chanson,$duree_chanson,$date_ajoute_chanson,$path_music))) {
// Query succeeded
move_uploaded_file($_FILES['path_music_chanson']['tmp_name'], "music/$msc");
echo "gooooooooooood for chanson";
$put_song = true;
echo "<br/>";

} else {
// Query failed.
echo "noooooooooooooooo error i cant send to data base for chanson  ";
echo "<br/>";
}



if (($put_song == true) && ($put_chanteur == true) ){
$dqc = conectiondb();

$x = array();
$x = select_idder ('id_chanteur ','chanteur','nom_artistique_chanteur',$nom_artistique_chanteur);
$id_chanteur_de_base =  $x[0]['id_chanteur'];


$y = array();
$y = select_idder ('id_chanson ','chanson','nom_chanson',$nom_chanson);

$id_chanson_de_base  =$y[0]['id_chanson'];

$sqldc = $dqc->prepare("INSERT INTO chanter   ( id_chanter_chanteur, id_chanter_chanson ) VALUES(?,?)");

$sqldc->execute(array($id_chanteur_de_base,$id_chanson_de_base));

//------------------------------------------------------------------------------------------------------------------------------------

$dqcc = conectiondb();

$tabi = array();
$tabi = select_idder ('id_album','album','titre_album',$titre_album);
$id_album_de_base =  $tabi[0]['id_album'];


$ktab = array();
$ktab = select_idder ('id_chanson ','chanson','nom_chanson',$nom_chanson);

$id_chanson2_de_base  = $ktab[0]['id_chanson'];

$sqldcc = $dqcc->prepare("INSERT INTO chansalbum   ( id_chansalbum_chanson, id_chansalbum_album ) VALUES(?,?)");

$sqldcc->execute(array($id_chanson2_de_base,$id_album_de_base));












// Query succeeded
// rani hnaaaaaaaaaaaaaaaaaaaaaa lazm njebed id_chanter_chanteur, id_chanter_chanteur men kol tabkeau bacg nhethom f
}





    }



// afffichage
/**
$sql = "SELECT * FROM blobi WHERE id = 11";
$sth = $db->query($sql);
 $result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'" alt = " khra" style = "width : 300px; height :400px;/>';

**/
//function __construct($nameMere, $description,$prix,$modele,$systemeExploitation,$ecran,$memoire,$batterie,$Appareil_photo,$ram,$poid,$color)
?>



<div style="width:70%;margin:4% 15%;">
<form style="width:70%;margin:4% 15%;" action="" method="post" enctype="multipart/form-data">
  <h2>producteur</h2>

<label >image producteur</label>
  <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;" type="file" name="path_producteur">

 <label>nom producteur</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="nom_producteur" >

 <label>date_naissance_producteur</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="date" name ="date_naissance_producteur" >

 <label>adresse_producteur</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="adresse_producteur" >

 <label>style_music_producteur</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="style_music_producteur" >

 <label>experience_producteur</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="number" name ="experience_producteur" >

 <label>nom_production</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="nom_production" >

 <label>adresse_production</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="adresse_production" >

 <label>capitale_production</label>
 <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="number" name ="capitale_production" >


<!-- --------------------------------------------------------------------------------------------------------------------------------  -->
  <h2>album</h2>

  <label >path_image_album</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;" type="file" name="path_image_album">

   <label>titre_album</label>
   <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="titre_album" >

   <label>description_album</label>
   <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="description_album" >

   <label>budget_album</label>
   <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="number" name ="budget_album" >

   <label>nombre_participant_album</label>
   <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="number" name ="nombre_participant_album" >

   <label>langue_album</label>
   <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="langue_album" >



   <h2>chanteur</h2>

   <label >path_chanteur</label>
     <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;" type="file" name="path_chanteur">

    <label>nom_chanteur</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="nom_chanteur" >

    <label>prenom_chanteur</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="prenom_chanteur" >

    <label>style_music_chanteur</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="style_music_chanteur" >

    <label>date_naissance_chanteur</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="date" name ="date_naissance_chanteur" >


    <label>anne_activite</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="number" name ="anne_activite" >

    <label>nom_artistique_chanteur</label>
    <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="nom_artistique_chanteur" >




       <h2>chanson</h2>

       <label >path_music_chanson</label>
         <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;" type="file" name="path_music_chanson">

        <label>nom_chanson</label>
        <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="nom_chanson" >

        <label>style_chanson</label>
        <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="text" name ="style_chanson" >

        <label>duree_chanson</label>
        <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="number" name ="duree_chanson" >

        <label>date_ajoute_chanson</label>
        <input style="margin-bottom: 20px;margin-top: 10px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;"  type ="date" name ="date_ajoute_chanson" >






<input style="margin-bottom: 20px;width:100%;padding: 15px;border-radius:5px;border:1px solid #7ac9b7;background-color: #4180C5;color: aliceblue;font-size:15px;cursor:pointer;" type="submit" name="submit" value="Upload">

</form>

</div>
