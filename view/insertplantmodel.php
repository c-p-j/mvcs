<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="page">
    <form action="/mvcs/index.php?controller=ctrlplantmodel&action=insertplantmodel" method="POST">
    <input type="text" name="model_name" placeholder="model name">

        <!-- <input type="hidden" name="active_implants" value="0"> -->
        <input type="submit">
    </form>
</div>
<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>