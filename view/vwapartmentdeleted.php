<?php
require_once "vwheader.php";
?>

<div class="page text-center">
    <h2>
        <?php echo "$count apartment/s deleted successfully"; ?>
    </h2>
    <a href='http://localhost/mvcs/?controller=ctrlapartment&action=viewapartmentall'> Previous page</a>
</div>

<?php
require_once "vwfooter.php";
?>