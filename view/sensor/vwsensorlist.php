<?php require_once 'view/vwheader.php'; ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- initialize datatable -->
<script>
    $(document).ready(function() {
        $('#sensors').DataTable();
    });
</script>

<script src="http://localhost/mvcs/js/footer.js"></script>

<h1 class="display-4">Sensors</h1>

<table id="sensors" class="display table table-striped table-bordered text-center">
    <thead>
        <tr>

            <?php if (isset($_SESSION["username"]) && $_SESSION["type"] > 0) { ?>
                <th>Delete</th>
                <th>Edit</th>
            <?php } ?>
            <th>Serial Number</th>
            <th>Status</th>
            <th>NOR</th>
            <th>Plant Name</th>
            <th>Model Name</th>
        </tr>
    </thead>

    <tbody>
        <?php
        //var_dump($dataset);
        if (isset($dataset)) {
            foreach ($dataset as $row) {
        ?>
                <tr>
                    <?php if (isset($_SESSION["username"]) && $_SESSION["type"] > 0) { ?>
                        <td>
                            <div class="d-inline">
                                <form action="index.php?controller=ctrlsensor&action=deletesensor" method="POST" class="text-center">
                                    <input type="hidden" name="where" value="<?php echo $row->getSensorSN() ?>">
                                    <button type="submit" class="btn border border-danger">Delete</button>
                                </form>
                        </td>

                        <td>
                            <form action="index.php?controller=ctrlsensor&action=updatesensor" method="POST" class="text-center">
                                <input type="hidden" name="previoussn" value="<?php echo $row->getSensorSN() ?>">
                                <input type="hidden" name="previousplant" value="<?php echo $row->getPlantId() ?>">
                                <input type="hidden" name="previousmodel" value="<?php echo $row->getModelName() ?>">
                                <button type="submit" class="btn btn_secondary border border-secondary">Edit</button>
                            </form>
                            </div>
                        </td>
                    <?php } ?>
                    <td><?php echo $row->getSensorSN() ?></td>
                    <td><?php echo $row->getStatus() ?></td>
                    <td><?php echo $row->getNOR() ?></td>
                    <td><a href="index.php?controller=ctrlplant&action=viewplant&id=<?php echo $row->getPlantId() ?>"><?php echo $row->getPlantName() ?></a></td>


                    <td><?php echo $row->getModelName() ?></td>
                </tr>

        <?php
            }
        }

        ?>
    </tbody>
</table>


<div class="container mb-4 mx-auto text-center">
    <form action="index.php?controller=ctrlsensor&action=insertsensor" class="my-auto" method="post">
        <input type="hidden" name="previous" value="<?php echo ($_POST['where']) ?>" />
        <button type="submit" class="btn btn-primary">New</button>
    </form>
</div>


<input type="button" onclick="document.location.href='index.php?controller=ctrlapartment&action=viewapartmentall';" value="Back" name="button" class="btn btn-primary float-right">
</div>
</div>

<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>