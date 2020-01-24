<?php
include 'Chanson.php.';



function conectiondb() {

    try {
        $db = new PDO("pgsql:host=localhost;dbname=Bdmusic","postgres","A123456");
    } catch (Exception $e) {
        echo "fail to connect to database";
    }
    return $db;
}

/**
 *
 *  $x  hada nom channson
 *   $modele nom_chanson variable
 * @return array
 */
function extracter($x,$modele){


$db = conectiondb();

//$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
$sql = "SELECT   *  FROM chanson  Cs, chanteur Ct, chanter Cha, album Al,  chansalbum CA,producteur Pc
WHERE   Cs.id_chanson = Cha.id_chanter_chanson
  AND         Cha.id_chanter_chanteur = Ct.id_chanteur
  AND      Cs.$modele like '$x'
  AND   Cs.id_chanson =CA.id_chansalbum_chanson
  AND CA.id_chansalbum_album =Al.id_album
  AND  Al.id_producteur_album = Pc.id_producteur   ;";

$result = $db->query($sql);
$tab = array();
while($row = $result->fetchAll()) {
//  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
$tab =$row;


}

return $tab ;

}

function extracter2($x,$modele){


    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM chanson  Cs, chanteur Ct, chanter Cha, album Al,  chansalbum CA,producteur Pc
WHERE   Cs.id_chanson = Cha.id_chanter_chanson
  AND         Cha.id_chanter_chanteur = Ct.id_chanteur
  AND      Cs.$modele = '$x'
  AND   Cs.id_chanson =CA.id_chansalbum_chanson
  AND CA.id_chansalbum_album =Al.id_album
  AND  Al.id_producteur_album = Pc.id_producteur   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return $tab ;

}




function counter() {
$db = conectiondb();


/**
 *  $dbh = dbConnect();
   $sql = "select * from `$table`";

   $stmt = $dbh->prepare($sql);
    try { $stmt->execute();}
    catch(PDOException $e){echo $e->getMessage();}

return $stmt->rowCount();
 * @var string $sql
 */

$sql = "SELECT * FROM chanson  Cs, chanteur Ct, chanter Cha, album Al,  chansalbum CA,producteur Pc
WHERE   Cs.id_chanson = Cha.id_chanter_chanson
  AND         Cha.id_chanter_chanteur = Ct.id_chanteur

  AND   Cs.id_chanson =CA.id_chansalbum_chanson
  AND CA.id_chansalbum_album =Al.id_album
  AND  Al.id_producteur_album = Pc.id_producteur   ;";

$result = $db->prepare($sql);
$result->execute();


// Return the number of rows in result set

//   printf("Result set has %d rows.\n",$rowcount);


return $result->rowCount();
}







function extracterAlbum(){


    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM  album Al   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }
    return  $tab;


}

function extracterAlbumInfo($x){
    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "select   producteur.*     ,album.* , chanson.nom_chanson, chanson.path_music_chanson , chanteur.nom_artistique_chanteur from album , producteur  , chanson , chansalbum , chanter , chanteur  where
chansalbum.id_chansalbum_album = (select album.id_album where album.titre_album = '$x')
and chansalbum.id_chansalbum_chanson = chanson.id_chanson
and chanson.id_chanson = chanter.id_chanter_chanson
and chanter.id_chanter_chanteur = chanteur.id_chanteur
and album.id_producteur_album = producteur.id_producteur   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return $tab ;




}



function productionextreaiere($x,$modele) {
    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM   album Al, producteur Pc
WHERE

      Pc.$modele like '$x'

  AND  Al.id_producteur_album = Pc.id_producteur   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }
    return $tab;
}





//$x = array();
//$x = extracterAlbumInfo("All Eyez on Me");

//var_dump($x);
//print_r($x);


function production($x,$modele){


    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM   album Al, producteur Pc
            WHERE
        Pc.$modele = '$x'
  AND  Al.id_producteur_album = Pc.id_producteur  ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return $tab ;

}







function extracterProducteur(){


    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM  producteur Al   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }
    return  $tab;


}



function stringSet($s) {
  //  $tab = array();

    $x=  str_replace(" ","+",$s);

    /*
    $tab = str_split($s);
    for ($i = 0; $i < count($tab); $i++) {
        if (empty($tab[$i])){
            $tab[$i] = '+';
        }
    }
    */
    return  $x ;
}




function extracterChanteur(){


    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM  chanteur Ch   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }
    return  $tab;


}



//rani hnaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
function extracterChansonInfo($x){
    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "select   chanson.* , chanteur.* from   chanson ,  chanter , chanteur  where
chansalbum.id_chansalbum_album = (select album.id_album where album.titre_album = '$x')
and chansalbum.id_chansalbum_chanson = chanson.id_chanson
and chanson.id_chanson = chanter.id_chanter_chanson
and chanter.id_chanter_chanteur = chanteur.id_chanteur
and album.id_producteur_album = producteur.id_producteur   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return $tab ;




}





function countAlbum() {
    $db = conectiondb();

    //$sql = "SELECT max(id_album) FROM album         ";
    $sql = "SELECT max(id_album) FROM album          group by  album.id_album";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return  count($tab) ;
}

//---------------- rani

function extracterChanteurInfo($x){
    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "select  DISTINCT chanteur.* , album.*   from   chanson ,  chanter , chanteur , album , chansalbum  where
  chanteur.nom_artistique_chanteur like '$x'
 and  chanter.id_chanter_chanteur = chanteur.id_chanteur
and chanter.id_chanter_chanson  =  chanson.id_chanson
and chanson.id_chanson = chansalbum.id_chansalbum_chanson
and chansalbum.id_chansalbum_album = album.id_album;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return $tab ;




}

function extracterSryle($x,$modele,$style){


    $db = conectiondb();

    //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
    $sql = "SELECT   *  FROM chanson  Cs, chanteur Ct, chanter Cha, album Al,  chansalbum CA,producteur Pc
WHERE   Cs.id_chanson = Cha.id_chanter_chanson

  AND         Cha.id_chanter_chanteur = Ct.id_chanteur

  AND      Cs.$modele = '$x'
  AND   Cs.id_chanson =CA.id_chansalbum_chanson
  AND   Cs.style_chanson like '$style'
  AND CA.id_chansalbum_album =Al.id_album
  AND  Al.id_producteur_album = Pc.id_producteur   ;";

    $result = $db->query($sql);
    $tab = array();
    while($row = $result->fetchAll()) {
        //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
        $tab =$row;


    }

    return $tab ;

}


function counterStyle($style) {
$db = conectiondb();




$sql = "SELECT * FROM chanson  Cs, chanteur Ct, chanter Cha, album Al,  chansalbum CA,producteur Pc
WHERE   Cs.id_chanson = Cha.id_chanter_chanson
  AND         Cha.id_chanter_chanteur = Ct.id_chanteur
AND   Cs.style_chanson like '$style'
  AND   Cs.id_chanson =CA.id_chansalbum_chanson
  AND CA.id_chansalbum_album =Al.id_album
  AND  Al.id_producteur_album = Pc.id_producteur   ;";

$result = $db->prepare($sql);
$result->execute();


// Return the number of rows in result set

//   printf("Result set has %d rows.\n",$rowcount);


return $result->rowCount();
}





function id_detector($style)
{



      $db = conectiondb();

      //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
      $sql = "SELECT   id_chanson  FROM chanson  Cs, chanteur Ct, chanter Cha, album Al,  chansalbum CA,producteur Pc
  WHERE   Cs.id_chanson = Cha.id_chanter_chanson

    AND         Cha.id_chanter_chanteur = Ct.id_chanteur
    AND   Cs.id_chanson =CA.id_chansalbum_chanson
    AND   Cs.style_chanson like '$style'
    AND CA.id_chansalbum_album =Al.id_album
    AND  Al.id_producteur_album = Pc.id_producteur   ;";

      $result = $db->query($sql);
      $tab = array();
      while($row = $result->fetchAll()) {
          //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
          $tab =$row;


      }

      return $tab ;


  # code...
}


function selector_id_dector ($style){

$tab =  array();
$x = array ();
$x = id_detector($style);
for ($i=0; $i < count($x) ; $i++) {
   array_push($tab,$x[$i]['id_chanson']);
   //echo $x['id_chanson'];
}

//var_dump($tab);
//var_dump($x[0]['id_chanson']);
return $tab;

}

//$sql = " Pc.id_producteur FROM    producteur Pc   WHERE    Pc.nom_producteur like  '$nameProducteur')";
/*
function select_id_producteur ($nameProducteur){


        $db = conectiondb();

        //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
        $sql = " Pc.id_producteur FROM    producteur Pc   WHERE    Pc.nom_producteur like  '$nameProducteur');";

        $result = $db->query($sql);
        $tab = array();
        while($row = $result->fetchAll()) {
            //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
            $tab =$row;


        }

        return $tab ;

}

*/






function select_id_producteur($nameProducteur)
{



      $db = conectiondb();

      //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
      $sql = "SELECT   *  FROM    producteur Pc
  WHERE     Pc.nom_producteur  like '$nameProducteur'

    ;";

      $result = $db->query($sql);
      $tab = array();
      while($row = $result->fetchAll()) {
          //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
          $tab =$row;


      }

      return $tab ;


  # code...
}





function select_idder ($f,$x,$y,$number){

  $db = conectiondb();

  $sql = "SELECT   $f  FROM    $x Pc
WHERE     Pc.$y  like  '$number';";



$result = $db->query($sql);
$tab = array();
while($row = $result->fetchAll()) {
    //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
    $tab =$row;


}

return $tab ;



}




function nom_producteurs (){

  $db = conectiondb();

  $sql = "SELECT   nom_producteur  FROM    producteur   ;";
$x =  array();


$result = $db->query($sql);
$tab = array();
while($row = $result->fetchAll()) {
    //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
    $tab =$row;


}

//return $tab ;

foreach ($tab as $key => $value) {

$valeur =    $value['nom_producteur'];

array_push($x,$valeur);

}


return $x;

}


function titre_album (){

  $db = conectiondb();

  $sql = "SELECT   titre_album   FROM    album    ;";
$x =  array();


$result = $db->query($sql);
$tab = array();
while($row = $result->fetchAll()) {
    //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
    $tab =$row;


}

//return $tab ;

foreach ($tab as $key => $value) {

$valeur =    $value['titre_album'];

array_push($x,$valeur);

}


return $x;

}



function nom_artistique (){

  $db = conectiondb();

  $sql = "SELECT   nom_artistique_chanteur    FROM    chanteur    ;";
$x =  array();


$result = $db->query($sql);
$tab = array();
while($row = $result->fetchAll()) {
    //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
    $tab =$row;


}

//return $tab ;

foreach ($tab as $key => $value) {

$valeur =    $value['nom_artistique_chanteur'];

array_push($x,$valeur);

}


return $x;

}


function nombre_chanson_album ($x){

  $db = conectiondb();

  //$sql = "SELECT * FROM chanson  WHERE $modele ='$x'";
  $sql = "     SELECT id_chansalbum_album, COUNT(id_chansalbum_chanson)
	FROM chansalbum  where id_chansalbum_album = '$x' GROUP BY id_chansalbum_album ;;";

  $result = $db->query($sql);
  $tab = array();
  while($row = $result->fetchAll()) {
      //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
      $tab =$row;


  }
$x = 0;


  foreach ($tab as $key => $value) {

  $valeur =    $value['count'];

  $x = $valeur ;

  }

  return $x;

}



function all_style(){
  $db = conectiondb();
  $sql = "SELECT  DISTINCT  style_chanson    FROM    chanson     ;";

$x =  array();
  $result = $db->query($sql);
  $tab = array();
  while($row = $result->fetchAll()) {
      //  echo "id: " . $row["id_produit"]. " - Namemere: " . $row["nameMere"]. " " . $row["description"]. "<br>";
      $tab =$row;


  }

  foreach ($tab as $key => $value) {

  $valeur =    $value['style_chanson'];
  array_push($x, $valeur);
}

return $x;

}

//$hak = nombre_chanson_album(5);
//echo "<hak chouf chhal kayen f album 5 fih chhal men ghnia>".$hak;


//var_dump(nom_producteurs());

/*
$x = array();
$x = select_idder ('id_chanteur ','chanteur','nom_artistique_chanteur','2PAC');
$f =  $x[0]['id_chanteur'];
echo "hada id_chanteur". $f;

$y = array();
$y = select_idder ('id_chanson ','chanson','nom_chanson','All Eyez on Me ');
echo "<br/>";
echo "hada id dyal chanson".$y[0]['id_chanson'];
*/
/*
$x = array ();
$x =  select_id_producteur ('ed sheeran');
echo  $x[0]['id_producteur'] ;

*













//var_dump (countAlbum());
//print_r( countAlbum()  );

//$x = count (  countAlbum() );

//echo $x;



//var_dump(stringSet("All Eyez on Me"));

//echo stringSet("All Eyez on Me");




//$x = production("Big Suge","nom_producteur");

//var_dump($x);


//$x = array();
//$x = extracter2($x, $modele)






/* $x = array();
$y = array();
$x = extracter("Only God Can Judge Me","nom_chanson");
//print_r($x);
$y = $x[0];
echo $y['nom_chanson'];

 */
