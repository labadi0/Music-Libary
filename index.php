<?php
// include 'Produit.php';
include 'connect.php';
include './inc/header.php';
include './inc/slider.php';


?>



 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3> nouvelles chansons </h3>
    		</div>
    		<div class="clear"></div>
    	</div>


	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <?php
				//	 $db = conectiondb();
				//	 $x = $Xiaomi_alpha_black->getModele();
				//	 $sql = "SELECT * FROM produit WHERE modele = '$x'";
				//	 $sth = $db->query($sql);
				//	 $result=mysqli_fetch_array($sth);
				//	 echo  ' <h2>'.$Xiaomi_alpha_black->getName().'</h2>';
				//	 echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';


					 ?>


			  	 	<h2><?php echo $chanson_1->getNom_album(); ?></h2>
            <?php
            echo '<img src="images/music.png" alt="s" >';

             ?>
					   <form action="preview.php" method="get">
					     <p><input style="border:none; text-align: center; " type="text" name="nomModele"value="<?php echo $chanson_1->getNom_chanson();?>"readonly></p>
					 <p><span class="price"><?php echo $chanson_1->getStyle_chanson();	?></span></p>
		<!-- 		     <div class="button"><span><a href="preview.php" class="details">Details-->
    <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>


				     </form>


				</div>


				<div class="grid_1_of_4 images_1_of_4">
					 <?php
					 /*
					 $db = conectiondb();

					 $x = $mateX_BLACK->getModele();
					 $sql = "SELECT * FROM produit WHERE modele = '$x'";
					 $sth = $db->query($sql);
					 $result=mysqli_fetch_array($sth);
					 echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
					 echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

					 */
					 ?>

				 <h2><?php echo $chanson_2->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
					 <form action="preview.php" method="get">
					     <p><input style="border:none; text-align: center;" type="text" name="nomModele"value="<?php echo $chanson_2->getNom_chanson();?>"readonly></p>
					 <p><span class="price"><?php echo $chanson_2->getStyle_chanson();?></span></p>
           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>
				     </form>
				</div>




        <div class="grid_1_of_4 images_1_of_4">
           <?php
           /*
           $db = conectiondb();

           $x = $mateX_BLACK->getModele();
           $sql = "SELECT * FROM produit WHERE modele = '$x'";
           $sth = $db->query($sql);
           $result=mysqli_fetch_array($sth);
           echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
           echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

           */
           ?>

         <h2><?php echo $chanson_4->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
           <form action="preview.php" method="get">
               <p><input style="border:none;  text-align: center;" type="text" name="nomModele"value="<?php echo $chanson_4->getNom_chanson();?>"readonly></p>
           <p><span class="price"><?php echo $chanson_4->getStyle_chanson();?></span></p>
           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>

             </form>
        </div>


        <div class="grid_1_of_4 images_1_of_4">
           <?php
           /*
           $db = conectiondb();

           $x = $mateX_BLACK->getModele();
           $sql = "SELECT * FROM produit WHERE modele = '$x'";
           $sth = $db->query($sql);
           $result=mysqli_fetch_array($sth);
           echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
           echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

           */
           ?>

         <h2><?php echo $chanson_3->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
           <form action="preview.php" method="get">
               <p><input style="border:none;  text-align: center;" type="text" name="nomModele"value="<?php echo $chanson_3->getNom_chanson();?>"readonly></p>
           <p><span class="price"><?php echo $chanson_3->getStyle_chanson();?></span></p>
           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>

             </form>
        </div>



			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>future chanson</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">


        <div class="grid_1_of_4 images_1_of_4">
           <?php
           /*
           $db = conectiondb();

           $x = $mateX_BLACK->getModele();
           $sql = "SELECT * FROM produit WHERE modele = '$x'";
           $sth = $db->query($sql);
           $result=mysqli_fetch_array($sth);
           echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
           echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

           */
           ?>

         <h2><?php echo $chanson_5->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
           <form action="preview.php" method="get">
               <p><input style="border:none; text-align: center; " type="text" name="nomModele"value="<?php echo $chanson_5->getNom_chanson();?>"readonly></p>
           <p><span class="price"><?php echo $chanson_5->getStyle_chanson();?></span></p>



           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>

             </form>


        </div>

        <div class="grid_1_of_4 images_1_of_4">
           <?php
           /*
           $db = conectiondb();

           $x = $mateX_BLACK->getModele();
           $sql = "SELECT * FROM produit WHERE modele = '$x'";
           $sth = $db->query($sql);
           $result=mysqli_fetch_array($sth);
           echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
           echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

           */
           ?>

         <h2><?php echo $chanson_6->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
           <form action="preview.php" method="get">
               <p><input style="border:none; text-align: center;" type="text" name="nomModele"value="<?php echo $chanson_6->getNom_chanson();?>"readonly></p>
           <p><span class="price"><?php echo $chanson_6->getStyle_chanson();?></span></p>
           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>
             </form>
        </div>

        <div class="grid_1_of_4 images_1_of_4">
           <?php
           /*
           $db = conectiondb();

           $x = $mateX_BLACK->getModele();
           $sql = "SELECT * FROM produit WHERE modele = '$x'";
           $sth = $db->query($sql);
           $result=mysqli_fetch_array($sth);
           echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
           echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

           */
           ?>

         <h2><?php echo $chanson_7->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
           <form action="preview.php" method="get">
               <p><input style="border:none; text-align: center;" type="text" name="nomModele"value="<?php echo $chanson_7->getNom_chanson();?>"readonly></p>
           <p><span class="price"><?php echo $chanson_7->getStyle_chanson();?></span></p>
           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>
             </form>
        </div>

        <div class="grid_1_of_4 images_1_of_4">
           <?php
           /*
           $db = conectiondb();

           $x = $mateX_BLACK->getModele();
           $sql = "SELECT * FROM produit WHERE modele = '$x'";
           $sth = $db->query($sql);
           $result=mysqli_fetch_array($sth);
           echo  ' <h2>'.$mateX_BLACK->getName().'</h2>';
           echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image2'] ).'"  />';

           */
           ?>

         <h2><?php echo $chanson_8->getNom_album(); ?></h2>
         <?php
         echo '<img src="images/music.png" alt="s" >';

          ?>
           <form action="preview.php" method="get">
               <p><input style="border:none; text-align: center;" type="text" name="nomModele"value="<?php echo $chanson_8->getNom_chanson();?>"readonly></p>
           <p style=" text-align: center;" ><span class="price"><?php echo $chanson_8->getStyle_chanson();?></span></p>
           <div ><span>   <input class="btn btn-primary" type="submit" name="monurl" value="Details"> </span>	</div>
             </form>
        </div>





			</div>
    </div>
 </div>

 <?php include 'inc/footer.php'; ?>
