<?php require_once 'view/vwheader.php'; ?>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<h1 class="display-4">Operators</h1>
<script>
    $(document).ready(function() {
        $('#operators').DataTable();
    });
</script>

<table id="operators" class="display table table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Delete</th>
            <th>Edit</th>
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
        ?>
                <tr>
                    <?php if (isset($_SESSION["username"]) && $_SESSION["type"] > 0) { ?>
                        <td>
                            <form action="index.php?controller=ctrloperator&action=deleteoperator" method="POST">
                                <input type="hidden" name="where" value="' . $row->getOperatorId() . '">
                                <button type="submit" class="btn border border-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form action="index.php?controller=ctrloperator&action=updateoperator" method="POST">
                                <input type="hidden" name="where" value="' . $row->getOperatorId() . '">
                                <button type="submit" class="btn border border-secondary">Edit</button>
                            </form>
                        </td>
                    <?php } ?>

                    <td><?php echo $row->getOperatorId() ?></td>
                    <td><?php echo $row->getName() ?></td>
                    <td><?php echo $row->getSurname() ?></td>
                </tr>
        <?php
            }
        }
        ?>
        <!-- <tr>
                <td colspan="4">

                </td>
            </tr> -->
    </tbody>
</table>

<div class="container-full mb-4">
    <div class="mx-auto h100 text-center">
        <form action="index.php?controller=ctrloperator&action=insertoperator" class="my-auto" method="post">
            <button type="submit" class="btn btn-primary">New</button>
        </form>
    </div>
</div>

</div>
<input type="button" onclick="document.location.href='index.php';" value="Back" name="button" class="btn btn-primary float-right">


<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>