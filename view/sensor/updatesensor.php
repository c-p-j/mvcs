<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Update Sensor</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlsensor&action=updatesensor" method="POST">
                select a Sensor: <select name="sensor_SN" placeholder="Sensor" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['previoussn'])) {
                    ?>
                        <option value='<?php echo ($_POST['previoussn']) ?>'> Default: <?php echo ($_POST['previoussn']) ?></option>
                    <?php
                    }
                    $sns = new modelSensor();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getSensorSN() . '">' . $row->getSensorSN() . '</option>';
                    }

                    ?>

                </select>
                <br>
                select status:<select name="status" placeholder="status" class="form-control mx-auto">
                    <option value="true">Operational</option>
                    <option value="false">Not Operational</option>
                </select>

                <br>
                <input type="text" name="NOR" placeholder="Non Operational reason (if any)" class="form-control mx-auto">


                <br>
                select model name:<select name="model_name" placeholder="Model Name" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['previousmodel'])) {
                    ?>
                        <option value="<?php echo ($_POST['previousmodel']) ?>"> Default: "<?php echo ($_POST['previousmodel'])?>"</option>


                    <?php
                    }
                    $sns = new modelSensorModel();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getModelName() . '">' . $row->getModelName() . '</option>';
                    }

                    ?>

                </select>

                <br>
                select Plant where installed:
                <select name="plant_id" placeholder="Plant where installed" class="form-control mx-auto">


                    <?php
                    if (isset($_POST['previousplant'])) {
                    ?>
                        <option value="<?php echo ($_POST['previousplant']) ?>"> Default: <?php echo ($_POST['previousplant']) ?></option>


                    <?php
                    }
                    $sns = new modelPlant();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getPlantId() . '">' . $row->getPlantId() . ' - ' . $row->getName() . '</option>';
                    }

                    ?>

                </select>

                <!-- <input type="hidden" name="active_sensors" value="0"> -->

                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>

        </div>

        <div class="col ">
            <i class="fa fa-industry fa-border fa-5x" aria-hidden="true"> </i>
            <p class="text-danger text-center">Changing the primary key is not allowed</p>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>