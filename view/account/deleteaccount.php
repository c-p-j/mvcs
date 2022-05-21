<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Delete Account</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlaccount&action=deleteaccount" method="POST">

                select an account: <select name="where" placeholder="Account" class="form-control mx-auto">

                    <?php
                    if (isset($_POST['where'])) {
                    ?>
                        <option value='<?php echo ($_POST['where']) ?>'> Default: <?php echo ($_POST['where']) ?></option>
                    <?php
                    }
                    $sns = new modelAccount();
                    $dataset = $sns->select([], []);

                    foreach ($dataset as $row) {
                        echo '<option value="' . $row->getUsername() . '">' . $row->getUsername() . '</option>';
                    }

                    ?>

                </select>
                    <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">

            </form>

        </div>

        <div class="col ">
            <i class="fa fa-user fa-border fa-5x" aria-hidden="true"> </i>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>