<?php
// require '../dataobject/dosensormodel.php';
require 'vwheader.php';
?>

<div class="page">
    <form action="/mvcs/index.php?controller=ctrloperator&action=insertoperator" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="surname" placeholder="surname">
        <!-- <input type="hidden" name="active_sensors" value="0"> -->

        <input type="submit" name="subbtn">
    </form>

    <?php

    ?>

</div>
<?php
// require '../dataobject/dosensormodel.php';
require 'vwfooter.php';

?>