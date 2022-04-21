<?php

require_once 'database.php';
require_once 'dataobject/doplant.php';

class modelPlant
{

    public static function insert($row)
    {
        var_dump($row) . '\n<br>';
        var_dump($row->getlanguage_id());
        $sqlText = "INSERT INTO plant (
                    `plant_id`,
                    `status`,
                    `name`,
                    `NOR`,
                    `model_name`,
                    `apartment_code`,
                    )
        VALUES (" . $row->getPlantId() . ",'" .
            $row->getStatus() . ",'" .
            $row->getName() . ",'" .
            $row->getNOR() . ",'" .
            $row->getModelName() . ",'" .
            $row->getApartmentCode() . "')";
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
        $sqlText = "DELETE FROM plant";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . "= '" . $value . "'";
            }
        }else{
            return 0;
        }

        $connection = Database::getConnection();
        $connection->beginTransaction();

        try {
            $sql = $connection->prepare($sqlText);
            $result = $sql->execute();
            $connection->commit();
            return $result;
        } catch (PDOException $e) {
            $connection->rollback();
            echo "Error delete: " . $sqlText . " " . $e->getMessage();
            return 0;
        }
    }
    // -----------------------------------------------------------------------------------------------------
    public static function select($where, $orderBy)
    {
        $sqlText = "SELECT * FROM plant";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . " = '" . $value."'";
            }
        }

        if (isset($orderBy) && count($orderBy) > 0) {
            $sqlText .= " ORDER BY ";
            foreach ($orderBy as $key => $value) {
                $sqlText .= " " . $key . " " . $value; // gestire separatore tra coppie
            }
        }
               var_dump ($sqlText);

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
                array_push($dataset, new dataobjPlant($row['plant_id'],$row['status'],$row['name'],$row['NOR'],$row['model_name'],$row['apartment_code']));
            }
            return $dataset;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            // echo "Error select: " . $sqlText. " ". $e->getMessage();
        }
    }
}