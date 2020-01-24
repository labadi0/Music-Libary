<?php
include 'inc/header.php';
include 'inc/signup.inc.php';
if(isset($_POST['submit'])){
  echo logup();
}
if(isset($_POST['submit2'])){
include_once'inc/conx.inc.php';
$username=$_POST['username'];
$password=$_POST['passw'];

    if(empty($username) || empty($password))
    {

    }else{
      $sql=$conn->prepare("SELECT * FROM utilisateur  WHERE mail_utilisateur=?");
      $sql->execute(array($username));
      $resultCheck=$sql->rowCount();
      if($resultCheck<1) {
        ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
        <?php
        echo 'Email est incorrect';

        echo '</div>';
      }else {
        $row = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($row) {
        foreach ($row as $key => $value) {
          $hashedpass=password_verify($password,$value['mot_de_passe_utilisateur']);
          if($hashedpass==false) {
            ?>
            <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display= 'none' ;">&times;</span>
            <?php
            echo 'mot de passe est incorrect';

            echo '</div>';
        }elseif ($hashedpass==true) {
          $_SESSION['nom_utilisateur']= $value['nom_utilisateur'];
          $_SESSION['id_utilisateur']= $value['id_utilisateur'];
          $_SESSION['prenom_utilisateur']= $value['prenom_utilisateur'];
          $_SESSION['mail_utilisateur']= $value['mail_utilisateur'];
          $_SESSION['adresse_utilisateur']= $value['adresse_utilisateur'];
          $_SESSION['telephone_utilisateur']=$value['telephone_utilisateur'];
          $_SESSION['mot_de_passe_utilisateur']= $value['mot_de_passe_utilisateur'];
          $_SESSION['date_naissance_utilisateur']= $value['date_naissance_utilisateur'];

          header("Location: index.php");
          exite();
            }



          }
        }
}
}
}


 ?>




 <div class="main">
    <div class="content">
    	 <div class="login_panel" style="    float: left;
    width: 245px;
    margin-right: 10px;
    padding: 20px;
    background: #FFF;
    border: 1px solid #C0BEBE;
    height: 330px;">
        	<h3>Deja ayant un compte</h3>
        	<p>Se connecter</p>
        	<form action="" method="POST" id="member">
                	<input name="username" type="text" value="" placeholder="email">
                    <input name="passw" type="password" value="" placeholder="password">
                    <div class="buttons"><div><button name="submit2" class="grey">connexion</button></div></div>

                 </form>
                    </div>
                    <div class="register_account" style="    background: #fff;
    border: 1px solid #c0bebe;
    border-radius: 3px;
    float: left;
    height: 330px;
    padding: 20px;
    width: 712px;">
                  		<h3>Creer un compte</h3>
                  		<form action = "" method = "POST">
              		   			 <table>
              		   				<tbody>
              						<tr>
              						<td>
              							<div>
              							<input type="text" name="name" value="" placeholder="nom">
              							</div>

              							<div>
              							   <input type="text" name="prenom" value="" placeholder="prenom" >
              							</div>

              							<div>
              								<input type="text" name="email" value="" placeholder="email">
              							</div>
              							<div>
              								<input type="text" name="address" value="" placeholder="adress">
              							</div>
              		    			 </td>
              		    			<td>
              						<div>
            <!--  							<input type="text" name="date" value="" palceholder="hhh">  -->
                            <input type="date" name="date" value="" >

              						</div>

                          <div>
                         <input type="text" name="phone" value="" placeholder="phone">
                         </div>

              		           <div>
              		          <input type="password" name="password" value="" placeholder="password" id="password"  onkeyup='check();'>
              		          </div>

              				  <div>
              					<input type="password" name="password2" value="" placeholder="confirme password" id="confirm_password"  onkeyup='check();'>
                        <div id='message'></div>

              				</div>
              		    	</td>
              		    </tr>
              		    </tbody></table>
              		   <div class="search"><div><button name="submit" class="grey">Create Account</button></div></div>

              		    <div class="clear"></div>
              		    </form>


                  	</div>


       <div class="clear"></div>
    </div>
 </div>
</div>
   <div class="footer">
   	  <div class="wrapper">
	     <div class="section group">


				    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>
