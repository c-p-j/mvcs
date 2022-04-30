<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="page">
    <form action="/mvcs/index.php?controller=ctrlplant&action=insertplant" method="POST">
        <input type="text" name="name" placeholder="name">

        <select name="status" placeholder="status">
            <option value="1">Operational</option>
            <option value="0">Not Operational</option>
        </select>

        <input type="text" name="NOR" placeholder="Non Operational reason">


        <select name="model_name" placeholder="Model Name">

            <?php


            $sns = new modelPlantModel();
            $dataset = $sns->select([], []);

            foreach ($dataset as $row) {
                echo '<option value="' . $row->getModelName() . '">' . $row->getModelName() . '</option>';
            }

            ?>

        </select>

        <select name="apartment_code" placeholder="Apartment where installed">
            <?php

            $sns = new modelApartment();
            $dataset = $sns->select([], []);

            foreach ($dataset as $row) {
                echo '<option value="' . $row->getApartmentCode() . '">' . $row->getApartmentCode() . '</option>';
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