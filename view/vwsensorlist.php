<?php require_once 'view/vwheader.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<!-- initialize datatable -->
<script>
    $(document).ready(function() {
        $('#sensors').DataTable();
    });
</script>


<br>
<br>
<br>
<br>


<h1>Available sensors</h1>

<table id="sensors" class="display table table-striped table-bordered">
    <thead>
        <tr>
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



<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>