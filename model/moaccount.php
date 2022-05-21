<?php

require_once 'database.php';
require_once 'dataobject/doapartment.php';

class modelAccount
{

    public static function insert($row)
    {
        //var_dump($row) . '\n<br>';
        $sqlText = "INSERT INTO users
        VALUES (NULL,'" . $row->getUsername()
            . "','" . $row->getPassword() . "'," .
            $row->getType() . ")";
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


    public static function delete($where)
    {
        $sqlText = "DELETE FROM users";

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
        $sqlText = "SELECT * FROM users";

        if (isset($where) && count($where) > 0) {
            $sqlText .= " WHERE ";
            foreach ($where as $key => $value) {
                $sqlText .= $key . "= :" . $key;
            }
        }

        if (isset($orderBy) && count($orderBy) > 0) {
            $sqlText .= " ORDER BY ";
            foreach ($orderBy as $key => $value) {
                // $sqlText .= " " . $key . " " . $value; // gestire separatore tra coppie
                $sqlText .= $key . "= :" . $key;
            }
        }
        //    //var_dump ($sqlText);

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
            // //var_dump($result);
            $dataset = array();
            foreach ($result as $row) {
                array_push($dataset, new dataobjAccount($row["username"], $row["password"], $row["type"]));
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
