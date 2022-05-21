<?php
require_once "view/vwheader.php";

?>
<div class="page">
    <h2>Query Error</h2>
    <h5>Make sure you specified at least one field to be updated, or check again the parameters of the insert page</h5>
    <br>
    <br>
    <br>
    <h5><?php echo $e;?></h5>
    <a href='http://localhost/mvcs/'> Previous page</a>
</div>
</div>
<?php
require_once "view/vwfooter.php";
?>