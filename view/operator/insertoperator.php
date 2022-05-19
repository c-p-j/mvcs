<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Operator</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrloperator&action=insertoperator" method="POST">
                <input type="text" name="name" placeholder="name" class="form-control mx-auto ">
                <br>
                <input type="text" name="surname" placeholder="surname" class="form-control mx-auto">
                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>
            
        </div>

        <div class="col ">
            <i class="fa fa-briefcase fa-border fa-5x" aria-hidden="true"> </i>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwfooter.php';

?>