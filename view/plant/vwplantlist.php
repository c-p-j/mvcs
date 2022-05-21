<?php require_once 'view/vwheader.php'; ?>

<h1 class="display-5 text-center">Plants <?php echo(isset($_POST['where']) ? "inside ".$_POST['where'] : ''); ?></h1>

<div class="container mx-auto text-center">
    <form action="index.php?controller=ctrlplant&action=insertplant" method="post">
        <input type="hidden" name="previous" value="<?php echo ($_POST['where']) ?>" />
        <button type="submit" class="btn btn-primary">New</button>
    </form>
</div>

<br>

<div class="container">
    <?php
    ////var_dump($dataset);
    // //var_dump($dataset);
    if (isset($dataset)) {
        $numcol = 3;
        $col = 0;
        foreach ($dataset as $row) {
            switch ($col % $numcol) { //decide se è l'inizio, il centro o la fine di una colonna
                case 0:
    ?>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card mx-auto <?php echo (count($dataset) === 1 ? "mw-50" : "") ?> w-100 py-0">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?php echo $row->getName() ?></b></h5>
                                    <p class="card-text"><b>ID:</b> <?php echo $row->getPlantId() ?></p>
                                    <p class="card-text"><b>Apartment:</b> <?php echo $row->getApartmentCode() ?></p>
                                    <p class="card-text"><b>Active Sensors:</b> <?php echo $row->getActiveSensors() ?></p>
                                    <p class="card-text"><b>Plant type:</b> <?php echo $row->getModelName() ?></p>
                                    <p class="card-text"><b>Status:</b>
                                        <?php
                                        if ($row->getStatus() == 1) {
                                            echo '<span class="text-success">Active</p>';
                                        } else {
                                            echo '<span class="text-danger">Not active</p>';
                                        }

                                        echo '</span>';
                                        ?>
                                    </p>
                                    <?php
                                    if ($row->getNOR() != NULL) {
                                        echo '<p class="card-text"><b>Reason:</b> ' .  $row->getNOR() . '</p>';
                                    } else {
                                    }
                                    ?>

                                </div>
                                <div class="card-body">
                                    <form action="index.php?controller=ctrlsensor&action=viewsensor" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                        <button type="submit" class="btn btn-primary ">Show sensors</button>
                                    </form>

                                    <form action="index.php?controller=ctrlplant&action=updateplant" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                        <input type="hidden" name="previous" value="<?php echo $_POST['where'] ?>">
                                        <button type="submit" class="btn btn-secondary">Edit</button>
                                    </form>

                                    <?php if (isset($_SESSION["username"]) && $_SESSION["type"] === EDIT_LEVEL) { ?>
                                        <form action="index.php?controller=ctrlplant&action=deleteplant" method="POST">
                                            <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    <?php
                    break;
                case $numcol - 1:
                    ?>
                        <div class="col">
                            <div class="card mx-auto w-100 py-0">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?php echo $row->getName() ?></b></h5>
                                    <p class="card-text"><b>ID:</b> <?php echo $row->getPlantId() ?></p>
                                    <p class="card-text"><b>Apartment:</b> <?php echo $row->getApartmentCode() ?></p>
                                    <p class="card-text"><b>Active Sensors:</b> <?php echo $row->getActiveSensors() ?></p>
                                    <p class="card-text"><b>Plant type:</b> <?php echo $row->getModelName() ?></p>
                                    <p class="card-text"><b>Status:</b>
                                        <?php
                                        if ($row->getStatus() == 1) {
                                            echo '<span class="text-success">Active</p>';
                                        } else {
                                            echo '<span class="text-danger">Not active</p>';
                                        }

                                        echo '</span>';
                                        ?>
                                    </p>
                                    <?php
                                    if ($row->getNOR() != NULL) {
                                        echo '<p class="card-text"><b>Reason:</b> ' .  $row->getNOR() . '</p>';
                                    } else {
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <form action="index.php?controller=ctrlsensor&action=viewsensor" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                        <button type="submit" class="btn btn-primary">Show sensors</button>

                                    </form>

                                    <form action="index.php?controller=ctrlplant&action=updateplant" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                        <input type="hidden" name="previous" value="<?php echo $_POST['where'] ?>">
                                        <button type="submit" class="btn btn-secondary">Edit</button>
                                    </form>
                                    <?php if (isset($_SESSION["username"]) && $_SESSION["type"] === EDIT_LEVEL) { ?>
                                        <form action="index.php?controller=ctrlplant&action=deleteplant" method="POST">
                                            <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    break;
                default:
                ?>
                    <div class="col">
                        <div class="card mx-auto w-100 py-0">
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo $row->getName() ?></b></h5>
                                <p class="card-text"><b>ID:</b> <?php echo $row->getPlantId() ?></p>
                                <p class="card-text"><b>Apartment:</b> <?php echo $row->getApartmentCode() ?></p>
                                <p class="card-text"><b>Active Sensors:</b> <?php echo $row->getActiveSensors() ?></p>
                                <p class="card-text"><b>Plant type:</b> <?php echo $row->getModelName() ?></p>
                                <p class="card-text"><b>Status:</b>
                                    <?php
                                    if ($row->getStatus() == 1) {
                                        echo '<span class="text-success">Active</p>';
                                    } else {
                                        echo '<span class="text-danger">Not active</p>';
                                    }

                                    echo '</span>';
                                    ?>
                                </p>
                                <?php
                                if ($row->getNOR() != NULL) {
                                    echo '<p class="card-text"><b>Reason:</b> ' .  $row->getNOR() . '</p>';
                                } else {
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <form action="index.php?controller=ctrlsensor&action=viewsensor" method="POST">
                                    <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                    <button type="submit" class="btn btn-primary">Show sensors</button>

                                </form>
                                <form action="index.php?controller=ctrlplant&action=updateplant" method="POST">
                                    <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                    <input type="hidden" name="previous" value="<?php echo $_POST['where'] ?>">
                                    <button type="submit" class="btn btn-secondary">Edit</button>
                                </form>
                                <?php if (isset($_SESSION["username"]) && $_SESSION["type"] === EDIT_LEVEL) { ?>
                                    <form action="index.php?controller=ctrlplant&action=deleteplant" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
    <?php
                    break;
            }
            $col = $col + 1;
        }
    }
    ?>
</div>

</div>

<input type="button" onclick="document.location.href='index.php?controller=ctrlapartment&action=viewapartmentall';" value="Back" name="button" class="btn btn-primary float-right">

<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>
<!-- 


<div class="row">
    <div class="col-sm">
        <div class="card mx-auto w-50">
            <div class="card-body">
                <h5 class="card-title"><b><?php echo $row->getName() ?></b></h5>
                <p class="card-text"><b>ID:</b> <?php echo $row->getPlantId() ?></p>
                <p class="card-text"><b>Active Sensors:</b> <?php echo $row->getActiveSensors() ?></p>
                <p class="card-text"><b>Plant type:</b> <?php echo $row->getModelName() ?></p>
                <p class="card-text"><b>Status:</b>
                    <?php
                    if ($row->getStatus() == 1) {
                        echo '<span class="text-success">Active</p>';
                    } else {
                        echo '<span class="text-danger">Not active</p>';
                    }

                    echo '</span>';
                    ?>
                </p>
                <?php
                if ($row->getNOR() != NULL) {
                    echo '<p class="card-text"><b>Reason:</b> ' .  $row->getNOR() . '</p>';
                } else {
                }
                ?>
                <p class="card-text"><b>plant:</b> <?php echo $row->getplantCode() ?></p>
            </div>
            <div class="card-body">
                <form action="index.php?controller=ctrlsensor&action=viewsensor" method="POST">
                    <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                    <button type="submit" class="btn btn-primary">Show sensors</button>

                </form>
                <form action="index.php?controller=ctrlplant&action=deleteplant" method="POST">
                    <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div> -->