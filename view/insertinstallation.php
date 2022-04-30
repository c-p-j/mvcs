<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="page">
    <form action="/mvcs/index.php?controller=ctrlinstallation&action=insertinstallation" method="POST">
        <input type="date" name="datetime" placeholder="datetime">

        <select name="plant_id" placeholder="plant_id">

            <?php


            $sns = new modelPlant();
            $dataset = $sns->select([], []);

            foreach ($dataset as $row) {
                echo '<option value="' . $row->getPlantId() . '">' . $row->getPlantId() . '</option>';
            }

            ?>

        </select>

        <select name="operator_id" placeholder="operator_id">
            <?php

            $sns = new modelOperator();
            $dataset = $sns->select([], []);

            foreach ($dataset as $row) {
                echo '<option value="' . $row->getOperatorId() . '">' . $row->getOperatorId() . '</option>';
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