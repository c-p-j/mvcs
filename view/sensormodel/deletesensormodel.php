<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Delete Sensor Model</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlsensormodel&action=deletesensormodel" method="POST">
                select a Sensor Model: <select name="where" placeholder="Sensor" class="form-control mx-auto">

                    <?php
                    $sns = new modelSensorModel();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getModelName() . '">' . $row->getModelName() . '</option>';
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
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>