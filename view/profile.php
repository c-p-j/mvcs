<?php
// session_start();
require 'vwheader.php';

// //var_dump($_SESSION);
?>

<div class="container">
    <div class="main-body">

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <i class="fa fa-user fa-5x text-center" aria-hidden="true"></i>

                            <div class="mt-3 d-inline-block">
                                <h4><?php echo ($_SESSION["username"]) ?></h4>
                                <p class="text-secondary mb-1">User priority level: <?php echo ((int)$_SESSION["type"]) ?></p>
                                <!-- <button class="btn btn-primary">Edit Data</button> -->

                                <?php if (isset($_SESSION["type"]) && $_SESSION["type"] >= EDIT_LEVEL) { ?>
                                    <form action="/mvcs/index.php?controller=ctrlaccount&action=insertaccount" method="post">
                                        <!-- <input type="hidden" name="username" value="<?php //echo ($_SESSION["username"]) 
                                                                                            ?>"> -->
                                        <button class="btn btn-primary" name="" type="submit">Add account</button>
                                    </form>

                                    <form action="/mvcs/index.php?controller=ctrlaccount&action=deleteaccount" method="post">
                                        <!-- <input type="hidden" name="username" value="<?php //echo ($_SESSION["username"]) 
                                                                                            ?>"> -->
                                        <button class="btn btn-outline-danger" type="submit">Delete account</button>
                                    </form>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-check fa-2x text-success"></i>
                            <span class="text-secondary">Modify Data</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <?php echo ($_SESSION["type"] == EDIT_LEVEL ? '<i class="fa fa-check fa-2x text-success"></i>' : '<i class="fa fa-times fa-2x text-danger"></i>') ?>
                            <span class="text-secondary">Delete Data</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-check fa-2x text-success"></i>
                            <span class="text-secondary">Insert Data</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <i class="fa fa-check fa-2x text-success"></i>
                            <span class="text-secondary">View Data</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Kenneth Valdez
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                fip@jukmuh.al
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                (239) 816-9029
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                (320) 380-4539
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Bay Area, San Francisco, CA
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " href="#">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php
require 'vwfooter.php';
?>