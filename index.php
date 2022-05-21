<?php
 //define the level of authority at which a user is allowed to modify data
if (!isset($_SESSION['username'])) session_start();
if (isset($_GET['logout']) && $_GET['logout'] == 'true') session_unset();

require_once 'controller/ctrlmain.php';
$controller = new controllerMain();
$controller->route();
// }
