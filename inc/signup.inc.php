<?php
function logup(){
  include_once'conx.inc.php';

      $message = "";
      $name = $_POST['name'];
      $prenom =$_POST['prenom'];
      $email = $_POST['email'];
      $address =$_POST['address'];
      $date = $_POST['date'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      if ( empty($name) || empty($prenom) || empty($email) || empty($address) || empty($date) || empty($phone) || empty($password))
      {
        $x = '<div class="alert">';
        $x .=           '  <span class="closebtn"  ';
        $x.=      '  onclick="this.parentElement.style.display = ';
        $x.=  " 'none' ;\"      "  ;
        $x.=  " >&times;</span>   "                 ;


      $x.= 'veuillez remplir tous les champs';
    //  echo         $x;
      $x .= "</div>";
      $mesasage = $x;
      }
      else {
          //$sql = "SELECT * FROM user WHERE email='$email'";
          $sql=$conn->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur=?");
          $sql->execute(array($email));

          $emailexist=$sql->rowCount();
          if($emailexist>0){


            $x = '<div class="alert">';
            $x .=        '  <span class="closebtn"  ';
            $x.=      '  onclick="this.parentElement.style.display = ';
            $x.=  " 'none' ;\"      "  ;
            $x.=  " >&times;</span>   "                 ;


          $x.= 'email que vous avez choisit est pris par un autre utilisatuer !';
        //  echo         $x;
          $x .= "</div>";
          $mesasage = $x;

        } else {
          $hashpass=password_hash($password,PASSWORD_DEFAULT);
          $sql1 =$conn->prepare("INSERT INTO utilisateur( nom_utilisateur, prenom_utilisateur,
            mail_utilisateur, adresse_utilisateur, date_naissance_utilisateur, telephone_utilisateur, mot_de_passe_utilisateur) VALUES(?,?,?,?,?,?,?)");

          $sql4=$sql1->execute(array($name, $prenom, $email, $address, $date, $phone, $hashpass));
          //$error = $sql1->errorInfo();
          //print_r($error);

          $sql2 =$conn->prepare("SELECT id_utilisateur FROM utilisateur WHERE mail_utilisateur=?");
          $sql3=$sql2->execute(array($email));
          $resultat=$sql2->fetchAll();

          foreach ($resultat as $key => $variable) {

              $iduser = $variable['id_utilisateur'];

              $sql4 =$conn->prepare("INSERT INTO client VALUES(?)");
              $sql5=$sql4->execute(array($iduser));
              //$error2 = $sql4->errorInfo();
              //print_r($error2);

            }


            $x = '<div class="success">';
            $x .=           '  <span class="closebtn"  ';
            $x.=      '  onclick="this.parentElement.style.display = ';
            $x.=  " 'none' ;\"      "  ;
            $x.=  " >&times;</span>   "                 ;


          $x.= 'inscription envoyé avec succés';
        //  echo         $x;
          $x .= "</div>";
          $mesasage = $x;
      }

    }
    return $mesasage;
}
