<?php require_once 'view/vwheader.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
 -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/r-2.2.9/datatables.min.css" />


<div class="page">


    <h1 class="display-4">Installations</h1>

    <table id="installations" class="display table table-striped table-bordered text-center">
        <thead>
            <tr>
                <?php if (isset($_SESSION["username"]) && $_SESSION["type"] === EDIT_LEVEL) { ?>
                    <th>Delete**</th>
                <?php } ?>

                <th>Edit</th>

                <th>Plant</th>
                <th>Operator</th>
                <th>Status</th>
                <th>Date time</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // //var_dump($dataset);
            if (isset($dataset)) {
                foreach ($dataset as $row) {
                    // //var_dump($row);
            ?>
                    <tr>
                        <?php if (isset($_SESSION["username"]) && $_SESSION["type"] === EDIT_LEVEL) { ?>
                            <td>
                                <form action="index.php?controller=ctrlinstallation&action=deleteinstallation" class="my-auto" method="post">
                                    <input type="hidden" name="wherePlant" value="<?php echo $row->getPlantId() ?>">
                                    <input type="hidden" name="whereOperator" value="<?php echo $row->getOperatorId() ?>">
                                    <button type="submit" class="btn btn-border border-danger">Delete</button>
                                </form>
                            </td>

                        <?php } ?>

                        <td>

                            <form action="index.php?controller=ctrlinstallation&action=updateinstallation" class="my-auto" method="post">
                                <input type="hidden" name="defaultDateTime" value="<?php echo $row->getDateTime() ?>">
                                <input type="hidden" name="previousplant" value="<?php echo $row->getPlantId() ?>">
                                <input type="hidden" name="previousstatus" value="<?php echo $row->getStatus() ?>">
                                <input type="hidden" name="previousoperator" value="<?php echo $row->getOperatorId() ?>">
                                <button type="submit" class="btn btn-border border-secondary">Edit</button>
                            </form>
                        </td>

                        <td><a href="index.php?controller=ctrlplant&action=viewplant&id=<?php echo $row->getPlantId() ?>"><?php echo $row->getPlantName() ?></a></td>

                        <td> <?php echo $row->getOperatorName() ?></td>
                        <td> <?php echo $row->getStatus() ?></td>
                        <td> <?php echo $row->getDateTime() ?></td>
                    </tr>
            <?php
                }
            }
            ?>
            <!-- <tr>
                <td colspan="6">
                    <div class="container-full h100 text-center">
                        <form action="index.php?controller=ctrlinstallation&action=insertinstallation" class="my-auto" method="post">
                            <button type="submit" class="btn btn-primary">New</button>
                        </form>
                    </div>
                </td>
            </tr> -->
        </tbody>
    </table>
</div>

<p class="font-weight-bold text-danger">**it's not allowed to delete an installation if it's already done</p>

<div class="container-full mb-4">
    <div class="mx-auto h100 text-center">
        <form action="index.php?controller=ctrlinstallation&action=insertinstallation" class="my-auto" method="post">
            <button type="submit" class="btn btn-primary">New</button>
        </form>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#installations').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/r-2.2.9/datatables.min.js"></script>


<input type="button" onclick="document.location.href='index.php';" value="Back" name="button" class="btn btn-primary float-right">

<!-- initialize datatable -->
<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>