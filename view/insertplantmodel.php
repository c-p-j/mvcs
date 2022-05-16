<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Plant Model</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlPlantModel&action=insertPlantModel" method="POST">
                <input type="text" name="model_name" placeholder="Model Name" class="form-control mx-auto ">
                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>
            
        </div>

        <div class="col ">
            <i class="fa fa-cog fa-border fa-3x" aria-hidden="true"> </i>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>