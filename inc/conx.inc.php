<?php


try {
    $conn = new PDO("pgsql:host=localhost;dbname=Bdmusic","postgres","A123456");
    // set the PDO error mode to exception
    }
catch(PDOException $e)
    {
    echo  $e->getMessage();
    }
?>
