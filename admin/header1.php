<?php
session_start();
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css"  />
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/forme.css"/>
<style>
.alert {
  padding: 20px;
  background-color: #4CAF50;
  color: white;
  top:400px;
  position: absolute;
  top: 75%;
  left: 30.5%;
  width: 37.5%;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

</head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
      <a class="navbar-brand" href="#">Admin</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../addProduit.php">Ajouter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deletecomnt.php">commentaires</a>
        </li>

        <?php
        echo '<li class="nav-item">';

          if (isset($_SESSION['username'])) {
          echo '<form class="butonform" action="logout.inc.php" method="post">
          <button class = "btn btn-success" type="submit" name="logout-submit" style=" float:right;margin-left: 850px;">déconnexion</button>
          </form>';
          echo '</li>';
              }
              ?>
      </ul>
    </nav>
