<?php
session_start();




function rak(){
  include_once'../inc/conx.inc.php';

$username=$_POST['useradmin'];
$password=$_POST['passadmin'];
$mesasage =  "";

    if(empty($username) || empty($password))
    {

    }else{
      $sql=$conn->prepare("SELECT * FROM admin  WHERE role=?");
      $sql->execute(array($username));
      $resultCheck=$sql->rowCount();
      if($resultCheck<1) {
        ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
        <?php
        echo 'username est incorrect';

        echo '</div>';

      }else {
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($row) {
        foreach ($row as $key => $value) {
          if($password != '123456') {
              $x = '<div class =  "alert">';
              $x .=           '  <span class="closebtn"  ';
              $x.=      '  onclick="this.parentElement.style.display = ';
              $x.=  " 'none' ;\"      "  ;
              $x.=  " >&times;</span>   "                 ;


            $x.= 'le mot de passe est incorrect';
          //  echo         $x;
            $x .= "</div>";
            $mesasage = $x;
        }else  {
          $_SESSION['username']= 'admin';

          header("Location: deletecomnt.php");
          exite();
            }



          }
        }
}
}

return $mesasage;
}
