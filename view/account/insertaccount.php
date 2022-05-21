<?php
// require '../dataobject/dosensormodel.php';
require 'view/vwheader.php';
?>

<div class="container border border-muted mx-auto my-3 w-50 text-center" style="border: 3px solid black;">
    <h1 class=" my-4">Insert Account</h1>
    <div class="row mx-auto">
        <div class="col form-group text-center">

            <form action="/mvcs/index.php?controller=ctrlaccount&action=insertaccount" method="POST">
                <input type="text" name="username" placeholder="username" class="form-control mx-auto ">
                <br>
                <input type="text" name="password" placeholder="password" class="form-control mx-auto">
                <!-- <input type="hidden" name="type" value="0"> -->
                <br>
                select type<select name="type" class="form-control mx-auto">
                    <option value="1">Administrator</option>
                    <option value="0">Dashboard Operator</option>
                </select>
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
require 'view/vwfooter.php';

?>