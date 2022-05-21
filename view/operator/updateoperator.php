<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Update Operator</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrloperator&action=updateoperator" method="POST">
                select an operator: <select name="operator_id" placeholder="operator ID" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['where'])) {
                    ?>
                        <option value="<?php echo ($_POST['where']) ?>"> Default: <?php echo ($_POST['where']) ?></option>
                    <?php
                    }
                    $sns = new modelOperator();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getOperatorId() . '">' . $row->getOperatorId() .' - '. $row->getName() . ' ' . $row->getSurname() . '</option>';
                    }

                    ?>

                </select>
                <br>
                <input type="text" name="name" placeholder="name" class="form-control mx-auto">
                <input type="text" name="surname" placeholder="surname" class="form-control mx-auto">
                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>
        </div>

        <div class="col ">
            <i class="fa fa-briefcase fa-border fa-5x" aria-hidden="true"> </i>
            <p class="text-danger text-center">The blank data will be kept as the previous values</p>
            <p class="text-danger text-center">Changing the primary key is not allowed</p>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>