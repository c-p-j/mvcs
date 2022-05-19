<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>
<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Sensor</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlsensor&action=insertsensor" method="POST">
                <input type="text" name="sensor_SN" placeholder="sensor SerialNumber" class="form-control mx-auto">
                <br>
                select status:<select name="status" placeholder="status" class="form-control mx-auto">
                    <option value="1">Operational</option>
                    <option value="0">Not Operational</option>
                </select>

                <br>
                <input type="text" name="NOR" placeholder="Non Operational reason (if any)" class="form-control mx-auto">


                <br>
                select model name:<select name="model_name" placeholder="Model Name" class="form-control mx-auto">

                    <?php


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
                    if (isset($_POST['previous'])) {
                    ?>
                        <option value=<?php echo ($_POST['previous']) ?>> Default: <?php echo ($_POST['previous']) ?></option>


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
            <i class="fa fa-podcast fa-border fa-5x" aria-hidden="true"> </i>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';
?>