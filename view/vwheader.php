<?php const EDIT_LEVEL = 1; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MVCS</title>
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="assets/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/android-icon-192x192.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="http://localhost/mvcs/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mvcs/css/style.css">

    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="https://s3.amazonaws.com/codecademy-content/courses/hour-of-code/js/alphabet.js"></script>


    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.6/components/dropdowns/">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.6/dist/css/bootstrap.min.css"> -->
</head>

<body id="body-wrapper">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="/mvcs/index.php">MVCS</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/mvcs/index.php?logout=true">Logout</a></li>
                    <li class="nav-item"><a class="nav-link" href="/mvcs/index.php?controller=ctrlaccount&action=viewprofile"><?php echo(isset($_SESSION["username"]) ? $_SESSION["username"] : "Profile"); ?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page">