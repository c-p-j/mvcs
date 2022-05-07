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
                echo '<td> <form action="index.php?controller=ctrlsensor&action=deletesensor" method="POST">
                <input type="hidden" name="where" value=' . $row->getSensorSN() . '">
                <button type="submit" class="btn border border-danger">Delete</button>
            </form></td>';
                echo "<td>" . $row->getSensorSN() . "</td>";
                echo "<td>" . $row->getStatus() . "</td>";
                echo "<td>" . $row->getNOR() . "</td>";
                echo "<td>" . $row->getPlantId() . "</td>";
                echo "<td>" . $row->getModelName() . "</td>";
                echo "</tr>";
            }
        }
        ?>
        <tr>
            <td colspan="6">
                <div class="container-full h100 text-center">
                    <form action="index.php?controller=ctrlsensor&action=insertsensor" class="my-auto" method="post">
                        <button type="submit" class="btn btn-primary">New</button>
                    </form>
                </div>
            </td>
        </tr>
    </tbody>
</table>


</div>
<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>