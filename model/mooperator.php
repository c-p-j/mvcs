<?php

require_once 'database.php';
require_once 'dataobject/dooperator.php';

class modeloperator
{

    public static function insert($row)
    {
        //var_dump($row) . '\n<br>';
        // //var_dump($row->getlanguage_id());
        $sqlText = "INSERT INTO operator (
                    `operator_id`,
                    `name`,`surname` )
        VALUES (NULL ,'" .
            $row->getName() . "','" .
            $row->getSurname() . "')";
        //var_dump($sqlText);

        $connection = Database::getConnection();
        $connection->beginTransaction();
        try {
            $sql = $connection->prepare($sqlText);
            $result = $sql->execute();
            $connection->commit();
            return $result;
        } catch (PDOException $e) {
            $connection->rollback();
            throw $e;

            return 0;
        }
    }

    public static function update($fields)
    {
        $sqlText = "UPDATE operator";
        /* VALUES ('" . $row->getApartmentCode()
            . "','" . $row->getAddress() . "',0)";
            */
                //var_dump($fields);

        if (isset($fields) && count($fields) > 0) {
            $sqlText .= " SET ";
            foreach ($fields as $key => $value) {
                // //var_dump(end($fields));
                if (isset($value) && !empty($value))
                    if (($value === end($fields)) && (key($fields) === $key))
                        $sqlText .= $key . " = :" . $key . ' ';
                    else
                        $sqlText .= $key . " = :" . $key . ', ';
            }
        } else {
            return 0;
        }

        $sqlText .= " WHERE operator_id = :operator_id";
        //var_dump($sqlText);
        $connection = Database::getConnection();
        $connection->beginTransaction();
        try {
            $sql = $connection->prepare($sqlText);
            //        //var_dump ($result);
            // $sql->setFetchMode(PDO::FETCH_ASSOC);
            if (isset($fields))
                $result = $sql->execute($fields);
            else
                $result = $sql->execute();
            // $result = $sql->fetchAll();
            $connection->commit();
            return $result;
            // //var_dump($result);
            // $dataset = array();
            // foreach ($result as $row) {
            //     array_push($dataset, new dataobjApartment($row["apartment_code"], $row["address"], $row["active_implants"]));
            // }
            // return $dataset;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            throw $e;
        }
    }

    public static function delete($where)
    {
        $sqlText = "DELETE FROM operator";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . " = :" . $key;
            }
        } else {
            return 0;
        }

        //var_dump($sqlText);
        $connection = Database::getConnection();
        $connection->beginTransaction();

        try {
            $sql = $connection->prepare($sqlText);
            //        //var_dump ($result);
            // $sql->setFetchMode(PDO::FETCH_ASSOC);
            if (isset($where) && count($where) > 0)
                $result = $sql->execute($where);
            else $result = $sql->execute();
            $connection->commit();
            // primo modo   return $result;
            // //var_dump($result);
            return $result;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            // echo "Error select: " . $sqlText. " ". $e->getMessage();
            throw $e;
        }
    }
    // -----------------------------------------------------------------------------------------------------
    public static function select($where, $orderBy)
    {
        $sqlText = "SELECT * FROM operator";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . "= :" . $key;
            }
        }

        if (isset($orderBy) && count($orderBy) > 0) {
            $sqlText .= " ORDER BY ";
            foreach ($orderBy as $key => $value) {
                $sqlText .= " " . $key . " " . $value; // gestire separatore tra coppie
            }
        }
        //        //var_dump ($sqlText);

        $connection = Database::getConnection();
        $connection->beginTransaction();
        try {
            $sql = $connection->prepare($sqlText);
            //        //var_dump ($result);
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            if (isset($where) && count($where) > 0)
                $sql->execute($where);
            else $sql->execute();
            $result = $sql->fetchAll();
            $connection->commit();
            // primo modo   return $result;

            $dataset = array();
            foreach ($result as $row) {
                array_push($dataset, new dataobjOperator($row['operator_id'], $row['name'], $row['surname']));
            }
            return $dataset;
        } catch (PDOException $e) {
            // roll back the transaction if something failed
            $connection->rollback();
            // echo "Error select: " . $sqlText. " ". $e->getMessage();
            throw $e;
        }
    }
}
