

<?php require_once 'view/vwheader.php'; ?>



<h1>Available apartments</h1>
<!-- <table>
        <tr>
            <th>Code</th>
            <th>Address</th>
        </tr> -->

<!-- <br><br><br><br><br> -->
<?php

// var_dump($dataset);
if (isset($dataset)) {
    foreach ($dataset as $row) {
        // echo "<tr>";
?>

        <div class="row">
            <div class="col-sm">
                <div class="card mx-auto w-50">
                    <div class="card-body">
                        <h5 class="card-title"><b>Apartment <?php echo $row->getApartmentCode() ?></b></h5>
                        <p class="card-text"><b>Location:</b> <?php echo $row->getAddress() ?></p>
                    </div>
                    <div class="card-body">
                        <form action="index.php?controller=ctrlplant&action=viewplant" method="POST">
                            <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                            <button type="submit" class="btn btn-primary">Show plants</button>

                        </form>
                        <!-- <a href="index.php?controller=ctrlplant&action=viewplant" class="card-link">Show plants</a> -->
                    </div>
                </div>
            </div>
        </div>


        <!--             // dataset no oggetti
            // echo "<td>".$row["language_id"]."</td>";
            // echo "<td>".$row["name"]."</td>";
            // echo "<td>".$row["last_update"]."</td>";
            // echo "<td>" . $row->getApartmentCode() . "</td>";
            // echo "<td>" . $row->getAddress() . "</td>";
            // echo "</tr>"; -->

<?php

    }
}
?>


<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>