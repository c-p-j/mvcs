<!DOCTYPE html>
<html>
    <head>
        <title>Elenco film</title>
    </head>
<body>
<?php require_once'view/vwheader.php';?>
    <h1>Elenco film</h1>
    <table>
        <tr>
            <th>codice</th>
            <th>nome</th>
            <th>ultima modifica</th>
        </tr>
<?php
////var_dump($dataset);
if (isset($dataset))
{   foreach ($dataset as $row) 
    {
    echo "<tr>"; 
// dataset no oggetti
//    echo "<td>".$row["language_id"]."</td>";
//    echo "<td>".$row["name"]."</td>";
//    echo "<td>".$row["last_update"]."</td>";
    echo "<td>".$row->getlanguage_id()."</td>";
    echo "<td>".$row->getname()."</td>";
    echo "<td>".$row->getlast_update()."</td>";
echo "</tr>"; 
    }
}
?>
</table>

    <?php require_once'view/vwfooter.php';?>
</body>
</html>