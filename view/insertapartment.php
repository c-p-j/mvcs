<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Apartment</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlapartment&action=insertapartment" method="POST">
                <input type="text" name="code" placeholder="apartment code" class="form-control mx-auto ">
                <br>
                <input type="text" name="address" placeholder="address" class="form-control mx-auto">
                <input type="hidden" name="active_implants" value="0">
                <br>
                <input type="submit" class="btn btn-primary" name="subbtn" value="Submit">
            </form>
            
        </div>

        <div class="col ">
            <i class="fa fa-home fa-border fa-5x" aria-hidden="true"> </i>
        </div>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>