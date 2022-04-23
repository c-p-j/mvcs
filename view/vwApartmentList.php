<?php require_once 'view/vwheader.php'; ?>

<br>
<br>
<br>
<br>


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

                        <div class="row">
                            <div class="col">
                                <h5 class="card-title"><b>Apartment <?php echo $row->getApartmentCode() ?></b></h5>
                                <p class="card-text"><b>Location:</b> <?php echo $row->getAddress() ?></p>
                                <p class="card-text"><b>Active implants:</b> <?php echo $row->getActiveImplants() ?></p>

                                <form action="index.php?controller=ctrlplant&action=viewplant" method="POST">
                                    <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                    <button type="submit" class="btn btn-primary">Show plants</button>
                                </form>
                                <form action="index.php?controller=ctrlapartment&action=deleteapartment" method="POST">
                                    <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>



                        </div>
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



<!-- <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
    Dropdown link
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div> -->
<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>