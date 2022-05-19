<?php

if (!isset($_SERVER['username'])) session_start();
if(isset($_GET['logout']) && $_GET['logout'] == 'true') session_unset();
// require_once './model/database.php';
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





// require_once 'login.php';

// if (isset($_SESSION["username"])) {
require_once 'controller/ctrlmain.php';
$controller = new controllerMain();
$controller->route();
// }
