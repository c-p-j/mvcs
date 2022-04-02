<?php require_once 'view/vwheader.php'; ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"></link>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<h1>Available sensors</h1>

<table id="sensors" class="table table-striped table-bordered" style="width:100%">
    <tr>
        <th>Serial Number</th>
        <th>Status</th>
        <th>NOR</th>
        <th>Plant ID</th>
        <th>Model Name</th>
    </tr>
    <?php
    //var_dump($dataset);
    if (isset($dataset)) {
        foreach ($dataset as $row) {
            echo "<tr>";
            // dataset no oggetti
            //    echo "<td>".$row["language_id"]."</td>";
            //    echo "<td>".$row["name"]."</td>";
            //    echo "<td>".$row["last_update"]."</td>";
            echo "<td>" . $row->getSensorSN() . "</td>";
            echo "<td>" . $row->getStatus() . "</td>";
            echo "<td>" . $row->getNOR() . "</td>";
            echo "<td>" . $row->getPlantId() . "</td>";
            echo "<td>" . $row->getModelName() . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

<?php require_once 'view/vwfooter.php'; ?>
</body>

<script type="text/javascript" src="../js/datatable.js"></script>

</html>