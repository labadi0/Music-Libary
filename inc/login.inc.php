<?php
session_start();


if(isset($_POST['submit2'])){
include_once'conx.inc.php';
$username=$_POST['username'];
$password=$_POST['passw'];

    if(empty($username) || empty($password))
    {

    }else{
      $sql=$conn->prepare("SELECT * FROM utilisateur  WHERE mail_utilisateur=?");
      $sql->execute(array($username));
      $resultCheck=$sql->rowCount();
      if($resultCheck<1) {
        header("Location: ../login.php?signin=userincorrect");
        exite();
        echo '<script>alert("email incorrect !");</script>';

      }else {
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($row) {
        foreach ($row as $key => $value) {
          $hashedpass=password_verify($password,$value['mot_de_passe_utilisateur']);
          if($hashedpass==false) {
            echo '<script>alert("mot de passe que vous avez entré est erroné !");</script>';

        }elseif ($hashedpass==true) {
          $_SESSION['nom_utilisateur']= $value['nom_utilisateur'];
          $_SESSION['id_utilisateur']= $value['id_utilisateur'];
          $_SESSION['prenom_utilisateur']= $value['prenom_utilisateur'];
          $_SESSION['mail_utilisateur']= $value['mail_utilisateur'];
          $_SESSION['adresse_utilisateur']= $value['adresse_utilisateur'];
          $_SESSION['telephone_utilisateur']=$value['telephone_utilisateur'];
          $_SESSION['mot_de_passe_utilisateur']= $value['mot_de_passe_utilisateur'];
          $_SESSION['date_naissance_utilisateur']= $value['date_naissance_utilisateur'];

          header("Location: ../index.php");
          exite();
            }



          }
        }
}
}
}
