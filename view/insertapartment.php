<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="page">
    <form action="/mvcs/index.php?controller=ctrlapartment&action=insertapartment" method="POST">
    <input type="text" name="code" placeholder="apartment code">
        <input type="text" name="address" placeholder="address">
        <!-- <input type="hidden" name="active_implants" value="0"> -->
        <input type="submit">
    </form>
</div>
<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>