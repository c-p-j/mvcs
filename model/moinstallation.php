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
                    `plant_id`,`operator_id`,`status` )
        VALUES ('" . $row->getDateTime() . "'," .
            $row->getPlantId() . "," .
            $row->getOperatorId() . ",'" .
            $row->getStatus() . "')";
        // var_dump($sqlText);


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

    public static function update($fields)
    {
        $sqlText = "UPDATE installation";
        /* VALUES ('" . $row->getApartmentCode()
            . "','" . $row->getAddress() . "',0)";
            */
        if (isset($fields) && count($fields) > 0) {
            $sqlText .= " SET ";
            foreach ($fields as $key => $value) {
                // var_dump(end($fields));
                if (isset($value) && !empty($value))
                    if ($value === end($fields))
                        $sqlText .= $key . " = :" . $key . ' ';
                    else
                        $sqlText .= $key . " = :" . $key . ', ';
            }
        } else {
            return 0;
        }

        // var_dump ($sqlText);


        $sqlText .= " WHERE operator_id = :operator_id AND plant_id = :plant_id";
        var_dump($sqlText);
        $connection = Database::getConnection();
        $connection->beginTransaction();
        try {
            $sql = $connection->prepare($sqlText);
            //        var_dump ($result);
            // $sql->setFetchMode(PDO::FETCH_ASSOC);
            if (isset($fields))
                $result = $sql->execute($fields);
            else
                $result = $sql->execute();
            // $result = $sql->fetchAll();
            $connection->commit();
            return $result;
            // var_dump($result);
            // $dataset = array();
            // foreach ($result as $row) {
            //     array_push($dataset, new dataobjApartment($row["apartment_code"], $row["address"], $row["active_implants"]));
            // }
            // return $dataset;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            echo "Error select: " . $sqlText . " " . $e->getMessage();
        }
    }

    public static function delete($where)
    {
        $sqlText = "DELETE FROM installation";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                if (isset($value) && !empty($value))

                    if (($value === end($where)) && (key($where) === $key)) //if two parameters have the same value, a new check on the key is made, the check consists to confront the key of the element under iteraction with the key of the array 
                        $sqlText .= $key . " = :" . $key . ' ';
                    else
                        $sqlText .= $key . " = :" . $key . ' AND ';
            }
        } else {
            return 0;
        }

        // var_dump($sqlText);
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
        $sqlText = "SELECT * FROM installation ";


        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                if (isset($value) && !empty($value))

                    if (($value === end($where)) && (key($where) === $key)) //if two parameters have the same value, a new check on the key is made, the check consists to confront the key of the element under iteraction with the key of the array 
                        $sqlText .= $key . " = :" . $key . ' ';
                    else
                        $sqlText .= $key . " = :" . $key . ' AND ';
            }
        }
        var_dump($sqlText);
        if (isset($orderBy) && count($orderBy) > 0) {
            $sqlText .= " ORDER BY ";
            foreach ($orderBy as $key => $value) {
                $sqlText .= $key . "= :" . $key; // gestire separatore tra coppie
            }
        }


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
                array_push($dataset, new dataobjInstallation($row['dateTime'], $row['plant_id'], $row['operator_id'], $row['status']));
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
