<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Update Installation</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlinstallation&action=updateinstallation" method="POST">
                select the plant: <select name="plant_id" placeholder="Plant" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['previousplant'])) {
                    ?>
                        <option value='<?php echo ($_POST['previousplant']) ?>'> Default: <?php echo ($_POST['previousplant']) ?></option>
                    <?php
                    }
                    $sns = new modelPlant();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getPlantId() . '">' . $row->getPlantId() . '</option>';
                    }

                    ?>

                </select>

                select the operator: <select name="operator_id" placeholder="Operator" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['previousoperator'])) {
                    ?>
                        <option value='<?php echo ($_POST['previousoperator']) ?>'> Default: <?php echo ($_POST['previousoperator']) ?></option>
                    <?php
                    }
                    $op = new modelOperator();
                    $dataset = $op->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getOperatorId() . '">' . $row->getName() . $row->getSurname() .  '</option>';
                    }

                    ?>

                </select>

                <br>
                select status:<select name="status" placeholder="status" default="<?php echo($_POST['previousstatus']) ?>" class="form-control mx-auto">
                    <option value="Pending">Pending</option>
                    <option value="Done">Done</option>
                </select>

                <br>

                Installation Date: 
                <input type="date" name="datetime" value="<?php echo($_POST['defaultDateTime']) ?>" class="form-control mx-auto ">   

                <!-- <input type="hidden" name="active_sensors" value="0"> -->

                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>

        </div>

        <div class="col ">
            <i class="fa fa-industry fa-border fa-5x" aria-hidden="true"> </i>
            <p class="text-danger text-center"></p>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>