<?php
require_once "view/vwheader.php";
?>

<div class="page text-center">
    <h2>
        <?php echo "$count installation/s inserted successfully"; ?>
    </h2>
    <a href='http://localhost/mvcs/?controller=ctrlapartment&action=viewapartmentall'> Previous page</a>
</div>

<?php
require_once "view/vwfooter.php";
?>