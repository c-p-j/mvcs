<?php require_once 'view/vwheader.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<!-- initialize datatable -->
<script>
    $(document).ready(function() {
        $('#operators').DataTable();
    });
</script>


<br>
<br>
<br>
<br>


<h1>Operators</h1>


<table id="operators" class="display table table-striped table-bordered">
<thead>
        <tr>
            <th>Operator ID</th>
            <th>Name</th>
            <th>Surname</th>
        </tr>
    </thead>

    <tbody>
    <?php
    //var_dump($dataset);
    if (isset($dataset)) {
        foreach ($dataset as $row) {
            echo "<tr>";
            // dataset no oggetti
            //    echo "<td>".$row["language_id"]."</td>";
            //    echo "<td>".$row["name"]."</td>";
            //    echo "<td>".$row["last_update"]."</td>";
            echo "<td>" . $row->getOperatorId() . "</td>";
            echo "<td>" . $row->getName() . "</td>";
            echo "<td>" . $row->getSurname() . "</td>";
            echo "</tr>";
        }
    }
    ?>
        </tbody>
</table>

<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>