

<?php require_once 'view/vwheader.php'; ?>



<h1>Available plants</h1>
<!-- <table>
        <tr>
            <th>Code</th>
            <th>Address</th>
        </tr> -->

<?php
//var_dump($dataset);
if (isset($dataset)) {
    foreach ($dataset as $row) {
        // echo "<tr>";
?>

        <div class="row">
            <div class="col-sm">
                <div class="card mx-auto w-50">
                    <div class="card-body">
                        <h5 class="card-title"><b><?php echo $row->getName() ?></b></h5>
                        <p class="card-text"><b>ID:</b> <?php echo $row->getPlantId() ?></p>
                        <p class="card-text"><b>Plant type:</b> <?php echo $row->getModelName() ?></p>
                        <p class="card-text"><b>Status:</b>
                            <?php
                            if ($row->getStatus() == 1) {
                                echo '<span class="text-success">Active</p>';
                            } else {
                                echo '<span class="text-danger">Not active</p>';
                            }

                            echo '</span>';
                            ?>
                        </p>
                        <?php
                        if ($row->getNOR() != NULL) {
                            echo '<p class="card-text"><b>Reason:</b> ' .  $row->getNOR() . '</p>';
                        } else {
                        }
                        ?>
                        <p class="card-text"><b>Apartment:</b> <?php echo $row->getApartmentCode() ?></p>
                    </div>
                    <div class="card-body">
                    <form action="index.php?controller=ctrlsensor&action=viewsensor" method="POST">
                            <input type="hidden" name="where" value="<?php echo $row->getPlantId() ?>">
                            <button type="submit" class="btn btn-primary">Show sensors</button>

                        </form>
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