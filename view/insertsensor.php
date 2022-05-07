<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="page">
    <form action="/mvcs/index.php?controller=ctrlsensor&action=insertsensor" method="POST">
        <input type="text" name="sensor_SN" placeholder="serial">

        <select name="status" placeholder="status">
            <option value="1">Operational</option>
            <option value="0">Not Operational</option>
        </select>

        <input type="text" name="NOR" placeholder="Non Operational reason">


        <select name="model_name" placeholder="Model Name">

            <?php


            $sns = new modelSensorModel();
            $dataset = $sns->select([], []);

            foreach ($dataset as $row) {
                echo '<option value="' . $row->getModelName() . '">' . $row->getModelName() . '</option>';
            }

            ?>

        </select>

        <select name="plant_id" placeholder="plant where installed">
            <?php

            $sns = new modelPlant();
            $dataset = $sns->select([], []);

            foreach ($dataset as $row) {
                echo '<option value="' . $row->getPlantId() . '">' . $row->getPlantId() .' - '. $row->getName() .'</option>';
            }

            ?>

        </select>

        <!-- <input type="hidden" name="active_sensors" value="0"> -->

        <input type="submit" name="subbtn">
    </form>

    <?php

    ?>

</div>
<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>