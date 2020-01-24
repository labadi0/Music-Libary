<?php
include_once'inc/header.php';
?>

<?php
include_once'inc/conx.inc.php';

$id_user = $_SESSION['id_utilisateur'];

if(isset($_POST['update'])){

  $name=$_POST['name'];
  $prenom=$_POST['prenom'];
  $date=$_POST['date'];
  $adresse=$_POST['adresse'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $hashpass=password_hash($password,PASSWORD_DEFAULT);

  if(!empty($password) ){
    $sql=$conn->prepare("UPDATE utilisateur
  	SET nom_utilisateur=?, prenom_utilisateur=?, date_naissance_utilisateur=?, adresse_utilisateur=?, telephone_utilisateur=?, mail_utilisateur=?, mot_de_passe_utilisateur=?
    WHERE id_utilisateur = $id_user");
    $sql->execute(array($name,$prenom,$date,$adresse,$phone,$email,$hashpass));
  } else {
    $sql=$conn->prepare("UPDATE utilisateur
  	SET nom_utilisateur=?, prenom_utilisateur=?, date_naissance_utilisateur=?, adresse_utilisateur=?, telephone_utilisateur=?, mail_utilisateur=?
    WHERE id_utilisateur = $id_user");
    $sql->execute(array($name,$prenom,$date,$adresse,$phone,$email));
  }
  //$error = $sql->errorInfo();
  //print_r($error);
  if($sql){

      $_SESSION['nom_utilisateur']= $name;
      $_SESSION['prenom_utilisateur'] = $prenom ;
      $_SESSION['adresse_utilisateur'] = $adresse;
      $_SESSION['telephone_utilisateur']= $phone;
      $_SESSION['mail_utilisateur']=$email;
      $_SESSION['date_naissance_utilisateur']=$date;
    ?>
    <div class="success">
    <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
    <?php
    echo 'Vous venez de modifier vos informations !';

    echo '</div>';

    }else{
      ?>
      <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
      <?php
      echo 'Echec de modification';

      echo '</div>';
  }

}
?>




<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Information personnels</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">vos avis</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Modifier vos infos</button>
</div>

<div id="London" class="tabcontent">
  <div class="register_account">
    <h3>Vos information personnelles</h3>
    <form method="POST" action="">
         <table>
          <tbody>
        <tr>
        <td>
          <div>
          <input type="text" name="name" value="<?php echo $_SESSION['nom_utilisateur'] ?>"readonly >
          </div>

          <div>
             <input type="text" name="prenom" value="<?php echo $_SESSION['prenom_utilisateur'] ?>" readonly>
          </div>

          <div>
            <input type="text" name="phone" value="<?php echo $_SESSION['telephone_utilisateur'] ?>" readonly>
          </div>
          <div>
            <input type="text" name="email" value="<?php echo $_SESSION['mail_utilisateur'] ?>" readonly>
          </div>
           </td>
          <td>
        <div>
          <input type="text" name="adresse" value="<?php echo $_SESSION['adresse_utilisateur'] ?>" readonly>
        </div>
        <div>
          <input type="text" name="date" value="<?php echo $_SESSION['date_naissance_utilisateur'] ?>" readonly>

     </div>

           <div>
          <input type="text" name="phone" value="<?php echo $_SESSION['telephone_utilisateur'] ?>" readonly>
          </div>

      <div>
      <input type="text" name="password" value="" placeholder="Password" readonly>
    </div>
      </td>
    </tr>
    </tbody></table>
    <div class="clear"></div>
    </form>
  </div>
</div>
<div id="Paris" class="tabcontent">
  <h3 id="h">Historique de vos Commentaires</h3>
  <?php
if(isset($_SESSION['id_utilisateur'])){
  $client=$_SESSION['id_utilisateur'];
  $sql=$conn->prepare("SELECT * FROM avis WHERE id_avis_no_util_cli=?");
  $sql->execute(array($client));
  $resultCheck=$sql->rowCount();

    if($resultCheck<1){
      echo "vous n'avez aucun commentaire";
    }else {

      while ($row = $sql->fetchAll(PDO::FETCH_ASSOC)){
        foreach ($row as $key => $value) {
          $id_chanson=$value['id_avis_chanson'];
          $date_comment=$value['date_avis'];
          $sql2=$conn->prepare("SELECT nom_chanson FROM chanson WHERE id_chanson=?");
          $sql2->execute(array($id_chanson));
          while ($row2 = $sql2->fetchAll(PDO::FETCH_ASSOC)){

            foreach ($row2 as $key2 => $value1) {

              echo "<div  class='commentaireclient'><p>";
              echo "<strong>La date de commentaire :</strong> ".$date_comment."<br>";
              echo "<br>";
              echo"Le nom de la chanson : ". $nom_chanson=$value1['nom_chanson']."<br>";
              echo "<br>";
              echo "Votre commentaire : ". $commentaire=$value['commentaire']."<br>";
              echo "<br>";
              echo "</p></div>";
            }


          }

        }


              }

          }
        }
  ?>

</div>

<div id="Tokyo" class="tabcontent">
  <div class="register_account">
    <h3>Vos information personnelles</h3>
    <form method="POST" action="">
         <table>
          <tbody>
        <tr>
        <td>
          <div>
          <input type="text" name="name" value="<?php echo $_SESSION['nom_utilisateur'] ?>" >
          </div>

          <div>
             <input type="text" name="prenom" value="<?php echo $_SESSION['prenom_utilisateur'] ?>">
          </div>
          <div>
         <input type="text" name="phone" value="<?php echo $_SESSION['telephone_utilisateur'] ?>" >
         </div>
          <div>
            <input type="text" name="email" value="<?php echo $_SESSION['mail_utilisateur'] ?>" >
          </div>
        </td>
       <td>
          <div>
            <input type="text" name="adresse" value="<?php echo $_SESSION['adresse_utilisateur'] ?>" >
          </div>

        <div>
          <input type="date"  name="date" min="1900-04-01" max="2050-04-20"  >
     </div>

     <div>
    <input type="text" name="phone66" readonly value="<?php echo $_SESSION['telephone_utilisateur'] ?>" >
    </div>

    <input type="password" name="password" value="" placeholder="Password" >
          <div>
        </div>
      </td>
    </tr>
    </tbody></table>
   <div class="search"><div><button name="update" class="grey">Mettre à jour</button></div></div>
    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
    <div class="clear"></div>
    </form>
  </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<?php
// include_once'footer.php';
?>
