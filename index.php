<?php
    //require_once './controller/filmController.php';
    //$controller = new filmController();
    //$controller->viewFilm(array(),array());
    //$controller->viewFilm(array("film_id"=>"1"),array());
    //$controller->viewFilm(array(),array("title"=>"desc"));
    
    //$controller->viewFilm(array("film_id"=>"1"),array("title"=>"asc"));
    /*
    $controller->insertFilm(array("title"=>"titolo",
            "description"=>"descrizione", 
            "release_year"=>"2022", 
            "language_id"=>"1",  
            "rental_duration"=>"5", 
            "length"=>"100"));
    */
    

    //se il login va a buon fine
require_once 'controller/ctrlmain.php';
$controller = new controllerMain();
$controller->route();
