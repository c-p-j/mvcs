<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Update Apartment</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlapartment&action=updateapartment" method="POST">

                select an apartment: <select name="apartment_code" placeholder="Apartment where installed" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['where'])) {
                    ?>
                        <option value='<?php echo ($_POST['where']) ?>'> Default: <?php echo ($_POST['where']) ?></option>
                    <?php
                    }
                    $sns = new modelApartment();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getApartmentCode() . '">' . $row->getApartmentCode() . '</option>';
                    }

                    ?>

                </select>
                <!-- <input type="text" name="apartment_code" placeholder="new name" class="form-control mx-auto"> -->

                <br>
                <input type="text" name="address" placeholder="new address" class="form-control mx-auto">
                <br>
                
                <!-- <input type="hidden" name="active_implants" value="0"> -->
                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>

        </div>

        <div class="col ">
            <i class="fa fa-home fa-border fa-5x" aria-hidden="true"> </i>
            <p class="text-danger text-center">Changing the primary key is not allowed</p>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>