<?php require_once 'view/vwheader.php'; ?>

<div class="container mx-auto text-center">
    <form action="index.php?controller=ctrlapartment&action=insertapartment" method="post">
        <button type="submit" class="btn btn-primary">New</button>
    </form>
</div>
<div class="container mx-auto mt-3 text-center">
    <?php
    // var_dump($dataset);
    if (isset($dataset)) {
        $numcol = 3;
        $col = 0;
        foreach ($dataset as $row) {
            switch ($col % $numcol) { //decide se è l'inizio, il centro o la fine di una colonna
                case 0:
    ?>
                <div class="row mb-4">
                        <div class="col">
                            <div class="card mx-auto w-100 text-left">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Apartment <?php echo $row->getApartmentCode() ?></b></h5>
                                    <p class="card-text"><b>Location:</b> <?php echo $row->getAddress() ?></p>
                                    <p class="card-text"><b>Active implants:</b> <?php echo $row->getActiveImplants() ?></p>
                                    <form action="index.php?controller=ctrlplant&action=viewplant" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-primary">Show plants</button>
                                    </form>
                                    <form action="index.php?controller=ctrlapartment&action=updateapartment" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-secondary">Edit</button>
                                    </form>
                                    <form action="index.php?controller=ctrlapartment&action=deleteapartment" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    break;
                case $numcol - 1:
                    ?>
                        <div class="col">
                            <div class="card mx-auto w-100 text-left">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Apartment <?php echo $row->getApartmentCode() ?></b></h5>
                                    <p class="card-text"><b>Location:</b> <?php echo $row->getAddress() ?></p>
                                    <p class="card-text"><b>Active implants:</b> <?php echo $row->getActiveImplants() ?></p>
                                    <form action="index.php?controller=ctrlplant&action=viewplant" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-primary">Show plants</button>
                                    </form>
                                    <form action="index.php?controller=ctrlapartment&action=updateapartment" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-secondary">Edit</button>
                                    </form>
                                    <form action="index.php?controller=ctrlapartment&action=deleteapartment" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    break;
                default:
                ?>
                    <div class="col">
                        <div class="card mx-auto w-100 text-left">
                            <div class="card-body">
                                <h5 class="card-title"><b>Apartment <?php echo $row->getApartmentCode() ?></b></h5>
                                <p class="card-text"><b>Location:</b> <?php echo $row->getAddress() ?></p>
                                <p class="card-text"><b>Active implants:</b> <?php echo $row->getActiveImplants() ?></p>
                                <form action="index.php?controller=ctrlplant&action=viewplant" method="POST">
                                    <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                    <button type="submit" class="btn btn-primary">Show plants</button>
                                </form>
                                <form action="index.php?controller=ctrlapartment&action=updateapartment" method="POST">
                                        <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                        <button type="submit" class="btn btn-secondary">Edit</button>
                                    </form>
                                <form action="index.php?controller=ctrlapartment&action=deleteapartment" method="POST">
                                    <input type="hidden" name="where" value="<?php echo $row->getApartmentCode() ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
    <?php
                    break;
            }
            $col = $col + 1;
        }
    }
    ?>
</div>

</div>

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