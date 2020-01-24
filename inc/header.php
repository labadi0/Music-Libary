<?php
session_start();
?>
<!DOCTYPE HTML>
<head>
<title>Bibliothèque musicale</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/div.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/rech.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  />
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<script src="js/func.js" type="text/javascript"></script>

<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<link rel="stylesheet"  type="text/css"  href="css/rech.css">
<link rel="stylesheet"  type="text/css"  href="css/msg.css">


<link rel="stylesheet" type="text/css" href="css/forme.css"/>

<script>
     var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').style.position = 'absolute';
    document.getElementById('message').style.float = 'right';
    document.getElementById('message').innerHTML = 'not matching';

  }
}
     </script>



<style>

.avis {
width: 1225px;
HEIGHT: 80px;
background-color: #E6E6FA;
padding-top: 18px;
margin-top: 12px;
}

.commentaire {
  margin-left: 12px;
  color: #222;
  font-family: Helvetica,Arial,sans-serif;
  font-size: 19px;
}
.auteur {
  font-weight: bold;
    font-size: 1em;
    white-space: nowrap;
}

#comment {
  width: 150%;
      height: 150px;
      padding: 12px 20px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      background-color: #f8f8f8;
      font-size: 16px;
      resize: none;

}
summary {
    display: block;
    background: #0d5d9c;
    color: white;
    border-radius: 5px;
    padding: 5px;
    cursor: pointer;
    font-weight: bold;
    width: 1217px;
    margin-top: 12PX;

}
</style>






</head>
<body>
  <div class="wrap">
		<div class="header_top">

			<div class="logo">
				<a   href="index.php"><img src="images/LOGO.jpg" alt="a"   style="width : 100px; height : 100px  "  /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
            <form action="" method="POST" id="search_form">
              <input type="text" name="search" id="search" placeholder="search users">
				    </form>
			    </div>
			    <div id="result">
                <ul>
                </ul>
                </div>


            <?php
              if (isset($_SESSION['id_utilisateur'])) {
              echo '<form class="butonform" action="inc/logout.inc.php" method="post">
              <button class = "btn btn-primary" type="submit" name="logout-submit" style="  float:right;  margin-top: -15px   ">Logout</button>
              <button class = "btn btn-success" type="submit"  name="reglageee-submit" style=" float:right; margin-top: -15px    ">'.$_SESSION['nom_utilisateur'].'</button>
                </form>';

                  }
              else {
                echo '<form class="butonform" action="login.php" method="post">
               <button class = "btn btn-primary" type="submit" name="login-submit" style="    float:right;  margin-top: -15px  ">  Login</button>  </form>';


              }

              ?>

		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>


 <?php
  if (isset($_SESSION['id_utilisateur'])) {

 echo '<div class="menu">
 	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
  <li><a href="index.php"> Accueil</a></li>
  <li><a href="productaffiche.php"> Chansons</a> </li>
  <li><a href="album.php"> Albums</a> </li>
  <li><a href="producteur.php"> Producteur</a> </li>
  <li><a href="chanteur.php"> Chanteur</a> </li>
  <li><a href="client.php"> Profil</a> </li>

 	  <div class="clear"></div>
 	</ul>
 </div>';
 }else{
   echo '<div class="menu">
   	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
    <li><a href="index.php"> Accueil</a></li>
   <li><a href="productaffiche.php"> Chansons</a> </li>
    <li><a href="album.php"> Albums</a> </li>
    <li><a href="producteur.php"> Producteur</a> </li>
    <li><a href="chanteur.php"> Chanteur</a> </li>
   	  <div class="clear"></div>
   	</ul>
   </div>';
 }

 ?>



<div id="infos">
</div>
