<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Installation</h1>
    <div class="row mx-auto">
        <div class="col form-group ">

            <form action="/mvcs/index.php?controller=ctrlinstallation&action=insertinstallation" method="POST" class="text-center">
                Installation Date: <input type="date" name="datetime" placeholder="datetime" class="form-control mx-auto ">

                <br>
                Select plant: <select name="plant_id" placeholder="plant_id" class="form-control mx-auto">

                    <?php


                    $sns = new modelPlant();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getPlantId() . '">' . $row->getPlantId() . ' - ' . $row->getName() . '</option>';
                    }

                    ?>

                </select>
                <br>

                Select operator: <select name="operator_id" placeholder="operator_id" class="form-control mx-auto ">
                    <?php

                    $sns = new modelOperator();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getOperatorId() . '">' . $row->getOperatorId() . ' - ' . $row->getName() . ' ' . $row->getSurname() . '</option>';
                    }

                    ?>

                </select>

                <br>
                Select status: <select name="status" placeholder="status" class="form-control mx-auto ">

                    <option value="Pending">Pending</option>
                    <option value="Done">Done</option>

                </select>

                <br>
                <!-- <input type="hidden" name="active_sensors" value="0"> -->

                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>
        </div>

        <div class="col ">
            <i class="fa fa-cogs fa-border fa-5x" aria-hidden="true"> </i>
        </div>
    </div>
</div>
</div>



<?php

?>

</div>
<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>