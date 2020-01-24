<?php

/**
 * @author TAREK
 *
 */
class Chanson
{

    public $nom_chanson;
    public $style_chanson;
    public $duree_chanson;
    public $date_ajoute;
    public $image_chanson;
    public $nom_album;





    function __construct($nom_chanson,$style_chanson,$duree_chanson,$date_ajoute,$image_chanson,$nom_album) {

        $this->nom_chanson = $nom_chanson;
        $this->style_chanson = $style_chanson;
        $this->duree_chanson = $duree_chanson;
        $this->date_ajoute = $date_ajoute;
        $this->image_chanson = $image_chanson;
        $this->nom_album = $nom_album;


    }







    /**
     * @return mixed
     */
    public function getNom_album()
    {
        return $this->nom_album;
    }

    /**
     * @param mixed $nom_album
     */
    public function setNom_album($nom_album)
    {
        $this->nom_album = $nom_album;
    }

    /**
     * @return mixed
     */
    public function getNom_chanson()
    {
        return $this->nom_chanson;
    }

    /**
     * @return mixed
     */
    public function getStyle_chanson()
    {
        return $this->style_chanson;
    }

    /**
     * @return mixed
     */
    public function getDuree_chanson()
    {
        return $this->duree_chanson;
    }

    /**
     * @return mixed
     */
    public function getDate_ajoute()
    {
        return $this->date_ajoute;
    }

    /**
     * @return mixed
     */
    public function getImage_chanson()
    {
        return $this->image_chanson;
    }

    /**
     * @param mixed $nom_chanson
     */
    public function setNom_chanson($nom_chanson)
    {
        $this->nom_chanson = $nom_chanson;
    }

    /**
     * @param mixed $style_chanson
     */
    public function setStyle_chanson($style_chanson)
    {
        $this->style_chanson = $style_chanson;
    }

    /**
     * @param mixed $duree_chanson
     */
    public function setDuree_chanson($duree_chanson)
    {
        $this->duree_chanson = $duree_chanson;
    }

    /**
     * @param mixed $date_ajoute
     */
    public function setDate_ajoute($date_ajoute)
    {
        $this->date_ajoute = $date_ajoute;
    }

    /**
     * @param mixed $image_chanson
     */
    public function setImage_chanson($image_chanson)
    {
        $this->image_chanson = $image_chanson;
    }

}


/*
public $nom_chanson;
public $style_chanson;
public $duree_chanson;
public $date_ajoute;
public $image_chanson;
 */

$chanson_1 = new Chanson('KILLSHOT','rap','4','2018-09-14','','kamikaze');
$chanson_2 = new Chanson('Only God Can Judge Me','rap','5','1996-11-12','','All Eyez on Me');
$chanson_3 = new Chanson('All Eyez on Me ','rap','5','04-04-2016','','All Eyez on Me');
$chanson_4 = new Chanson('Moves Like Jagger','pop','5','2010-12-12','','move like jugger');
$chanson_5 = new Chanson('talk','pop','5,5','02-08-2014','','midle');
$chanson_6 = new Chanson('turn down for what','pop','7.7','01-02-2017','','midle');
$chanson_7 = new Chanson('lean on','pop','4','02-08-2017','','lean on');
$chanson_8 = new Chanson('this is it ','rap','4','04-04-2010','','pop');
$chanson_9 = new Chanson('chanson9','pop','6','02-04-2011','','album8');
