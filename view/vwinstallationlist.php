<?php require_once 'view/vwheader.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
 -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/r-2.2.9/datatables.min.css" />


<div class="page">


    <h1 class="display-4">Installations</h1>

    <table id="installations" class="display table table-striped table-bordered">
        <thead>
            <tr>
                <th>Plant ID</th>
                <th>Operator</th>
                <th>Date time</th>
            </tr>
        </thead>

        <tbody>
            <?php
            //var_dump($dataset);
            if (isset($dataset)) {
                foreach ($dataset as $row) {
                    echo "<tr>";
                    echo "<td>" . $row->getPlantId() . "</td>";
                    echo "<td>" . $row->getOperatorId() . "</td>";
                    echo "<td>" . $row->getDateTime() . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            <tr>
                <td colspan="6">
                    <div class="container-full h100 text-center">
                        <form action="index.php?controller=ctrlinstallation&action=insertinstallation" class="my-auto" method="post">
                            <button type="submit" class="btn btn-primary">New</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
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

<!-- initialize datatable -->
<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>