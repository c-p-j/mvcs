<?php

require_once 'database.php';
require_once 'dataobject/doinstallation.php';

class modelInstallation
{

    public static function insert($row)
    {
        var_dump($row) . '\n<br>';
        // var_dump($row->getlanguage_id());
        $sqlText = "INSERT INTO installation (
                    `dateTime`,
                    `plant_id`,`operator_id` )
        VALUES ('" . $row->getDateTime() . "'," .
            $row->getPlantId() . "," .
            $row->getOperatorId() . ")";
        var_dump($sqlText);


        $connection = Database::getConnection();
        $connection->beginTransaction();
        try {
            $sql = $connection->prepare($sqlText);
            $result = $sql->execute();
            $connection->commit();
            return $result;
        } catch (PDOException $e) {
            $connection->rollback();
            echo "Error insert: " . $sqlText . " " . $e->getMessage();
            return 0;
        }
    }

    public static function update($pl)
    {
        // ...
    }

    public static function delete($pl)
    {
        // ...
    }
    // -----------------------------------------------------------------------------------------------------
    public static function select($where, $orderBy)
    {
        $sqlText = "SELECT * FROM installation;";


        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . "= :" . $key;
            }
        }

        if (isset($orderBy) && count($orderBy) > 0) {
            $sqlText .= " ORDER BY ";
            foreach ($orderBy as $key => $value) {
                $sqlText .= $key . "= :" . $key; // gestire separatore tra coppie
            }
        }
        //        var_dump ($sqlText);

        $connection = Database::getConnection();
        $connection->beginTransaction();
        try {
            $sql = $connection->prepare($sqlText);
            //        var_dump ($result);
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            if (isset($where) && count($where) > 0)
                $sql->execute($where);
            else $sql->execute();
            $result = $sql->fetchAll();
            $connection->commit();
            // primo modo   return $result;

            $dataset = array();
            foreach ($result as $row) {
                array_push($dataset, new dataobjInstallation($row['dateTime'], $row['plant_id'], $row['operator_id']));
                // array_push($dataset, new dataobjInstallation($row['dateTime'],$row['implant'],$row['operator']));
            }
            return $dataset;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            // echo "Error select: " . $sqlText. " ". $e->getMessage();
        }
    }
}
