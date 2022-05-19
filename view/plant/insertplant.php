<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Plant</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlplant&action=insertplant" method="POST">
                <input type="text" name="name" placeholder="Name" class="form-control mx-auto">
                <br>
                select status:
                <select name="status" placeholder="status" class="form-control mx-auto">
                    <option value="1">Operational</option>
                    <option value="0">Not Operational</option>
                </select>
                <br>

                <input type="text" name="NOR" placeholder="Non Operational reason (if any)" class="form-control mx-auto">

                <br>

                select model:
                <select name="model_name" placeholder="Model Name" class="form-control mx-auto">

                    <?php


                    $sns = new modelPlantModel();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getModelName() . '">' . $row->getModelName() . '</option>';
                    }

                    ?>

                </select>
                <br>

                select apartment where installed:
                <select name="apartment_code" placeholder="Apartment where installed" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['previous'])) {
                    ?>
                        <option value=<?php echo ($_POST['previous']) ?>> Default: <?php echo ($_POST['previous']) ?></option>


                    <?php
                    }
                    $sns = new modelApartment();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getApartmentCode() . '">' . $row->getApartmentCode() . '</option>';
                    }

                    ?>


                </select>

                <br>
                <!-- <input type="hidden" name="active_sensors" value="0"> -->

                <input type="submit" name="subbtn" class="btn btn-primary" value="Submit">
            </form>

        </div>

        <div class="col ">
            <i class="fa fa-industry fa-border fa-5x" aria-hidden="true" > </i>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>