<?php

require_once 'database.php';
require_once 'dataobject/doplantmodel.php';

class modelPlantModel
{

    public static function insert($row)
    {
        var_dump($row) . '\n<br>';
        // var_dump($row->getlanguage_id());
        $sqlText = "INSERT INTO plantmodel (
                    `model_name`)
        VALUES ('" . $row->getModelName() . "')";
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

    public static function delete($where)
    {
        $sqlText = "DELETE FROM plantmodel";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . " = :" . $key;
            }
        } else {
            return 0;
        }

        var_dump($sqlText);
        $connection = Database::getConnection();
        $connection->beginTransaction();

        try {
            $sql = $connection->prepare($sqlText);
            //        var_dump ($result);
            // $sql->setFetchMode(PDO::FETCH_ASSOC);
            if (isset($where) && count($where) > 0)
                $result = $sql->execute($where);
            else $result = $sql->execute();
            $connection->commit();
            // primo modo   return $result;
            // var_dump($result);
            return $result;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            // echo "Error select: " . $sqlText. " ". $e->getMessage();
        }
    }
    // -----------------------------------------------------------------------------------------------------
    public static function select($where, $orderBy)
    {
        $sqlText = "SELECT * FROM plantmodel";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . "= " . $value;
            }
        }

        if (isset($orderBy) && count($orderBy) > 0) {
            $sqlText .= " ORDER BY ";
            foreach ($orderBy as $key => $value) {
                $sqlText .= " " . $key . " " . $value; // gestire separatore tra coppie
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
                array_push($dataset, new dataobjplantModel($row['model_name']));
            }
            return $dataset;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            // echo "Error select: " . $sqlText. " ". $e->getMessage();
        }
    }
}
