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

<h1 class="display-4">Sensors</h1>

<table id="sensors" class="display table table-striped table-bordered">
    <thead>
        <tr>
            <th>Delete</th>
            <th>Edit</th>
            <th>Serial Number</th>
            <th>Status</th>
            <th>NOR</th>
            <th>Plant ID</th>
            <th>Model Name</th>
        </tr>
    </thead>

    <tbody>
        <?php
        //var_dump($dataset);
        if (isset($dataset)) {
            foreach ($dataset as $row) {
                echo "<tr>";
                echo '<td> 
                <div class="d-inline"><form action="index.php?controller=ctrlsensor&action=deletesensor" method="POST">
                <input type="hidden" name="where" value="' . $row->getSensorSN() . '">
                <button type="submit" class="btn border border-danger">Delete</button>
            </form></td>
            <td>
            <form action="index.php?controller=ctrlsensor&action=updatesensor" method="POST">
            <input type="hidden" name="previoussn" value="' . $row->getSensorSN() . '">
            <input type="hidden" name="previousplant" value=' . $row->getPlantId() . '>
            <input type="hidden" name="previousmodel" value="' . $row->getModelName() . '">
            <button type="submit" class="btn btn_secondary border border-secondary">Edit</button>
        </form></div>
        </td>';
                echo "<td>" . $row->getSensorSN() . "</td>";
                echo "<td>" . $row->getStatus() . "</td>";
                echo "<td>" . $row->getNOR() . "</td>";
                echo "<td>" . $row->getPlantId() . "</td>";
                echo "<td>" . $row->getModelName() . "</td>";
                echo "</tr>";
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


</div>
<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>