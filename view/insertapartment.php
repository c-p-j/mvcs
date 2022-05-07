<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="container border border-primary mx-auto">
    <div class="form-group">
        <form action="/mvcs/index.php?controller=ctrlapartment&action=insertapartment" method="POST">
            <input type="text" name="code" placeholder="apartment code" class="form-control">
            <input type="text" name="address" placeholder="address" class="form-control">
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>
</div>

<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>