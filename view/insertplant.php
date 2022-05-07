<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>


    <div class="container mx-auto">
        <div class="form-group">
            <form action="/mvcs/index.php?controller=ctrlplant&action=insertplant" method="POST">
                <input type="text" name="name" placeholder="Name" class="form-control form-control-lg">

                <select name="status" placeholder="status" class="form-control form-control-lg">
                    <option value="1">Operational</option>
                    <option value="0">Not Operational</option>
                </select>

                <input type="text" name="NOR" placeholder="Non Operational reason" class="form-control form-control-lg">


                <select name="model_name" placeholder="Model Name" class="form-control form-control-lg">

                    <?php


                    $sns = new modelPlantModel();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getModelName() . '">' . $row->getModelName() . '</option>';
                    }

                    ?>

                </select>

                <select name="apartment_code" placeholder="Apartment where installed" class="form-control form-control-lg">
                    <?php

                    $sns = new modelApartment();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getApartmentCode() . '">' . $row->getApartmentCode() . '</option>';
                    }

                    ?>

                </select>

                <!-- <input type="hidden" name="active_sensors" value="0"> -->

                <input type="submit" name="subbtn" class="btn btn-primary">
            </form>

            <?php

            ?>
            </div>
        </div>
    </div>
    <?php
    // require '../dataobject/dosensormodel.php';
    require 'vwfooter.php';

    ?>