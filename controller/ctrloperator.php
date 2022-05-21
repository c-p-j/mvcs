<?php
require_once 'dataobject/dooperator.php';

class ctrloperator
{

    public function viewoperator()
    {

        if (isset($_POST['where'])) {
            $where = array('operator_id' => $_POST['where']);
            $orderBy = array('name' => 'asc');
        } else {
            $where = [];
            $orderBy = [];
        };


        if (isset($_GET['id'])) {
            $where = array('operator_id' => $_GET['id']);
            $orderBy = array('name' => 'asc');
        }

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'operator_id') {
                $orderBy = array('operator_id' => 'asc');
            };
            if ($_POST['order'] == 'name') {
                $orderBy = array('name' => 'asc');
            };
            if ($_POST['order'] == 'surname') {
                $orderBy = array('name' => 'asc');
            };
        } else {
            $orderBy = [];
        };

        require_once 'model/mooperator.php';
        $operator = new modeloperator();


        try {
            //code...
            $dataset = $operator->select($where, $orderBy);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/operator/vwoperatorlist.php';
    }

    public function viewoperatorall()
    {
        require_once 'model/mooperator.php';
        $operator = new modeloperator();
        $dataset = $operator->select([], []);

        try {
            //code...
            $dataset = $operator->select([], []);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/operator/vwoperatorlist.php';
    }

    public function insertoperator()
    {
        require_once 'model/mooperator.php';
        // $row = new dataobjOperator($_POST['code'], $_POST['name'], $_POST['surname']);
        // $operator = new modeloperator();

        // require_once 'model/moplant.php';

        if (isset($_POST['name'], $_POST['surname']) && !empty($_POST['name']) && !empty($_POST['surname'])) {

            $row = new dataobjOperator(NULL, $_POST['name'], $_POST['surname']);
            $operator = new modeloperator();
            try {
                //code...
                $count = $operator->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/operator/vwoperatorinserted.php';
        } else {
            // require_once 'model/moapartment.php';
            // require_once 'model/moplantmodel.php';
            require_once 'view/operator/insertoperator.php';
        }
    }

    public function deleteoperator()
    {
        require_once 'model/mooperator.php';

        if (isset($_POST['where'])) {
            $where = array('operator_id' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/errorpage.php';
            return;
        };

        // $row = new dataobjApartment($_POST['code'], $_POST['address']);
        $operator = new modeloperator();
        try {
            //code...
            $count = $operator->delete($where);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/operator/vwoperatordeleted.php';
    }


    public function updateoperator()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['apartment_code'], $row['active_sensors']);
        // $plant = new modelPlant();
        // $count = $plant->insert($row);
        // require_once 'view/operator/vwplantinserted.php';
        require_once 'model/mooperator.php';

        if (isset($_POST['operator_id'])) {
            // $row = new dataobjApartment($_POST['code'], $_POST['address'], $_POST['active_implants']);
            $fields = array(
                'operator_id' => (int)$_POST['operator_id'],
                'name' => $_POST['name'],
                'surname' => $_POST['surname']
            );
            $operator = new modelOperator();
            try {
                //code...
                $count = $operator->update($fields);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/operator/vwoperatorupdated.php';
        } else {
            // require 'E:\xampp\htdocs\mvcs\view\vwheader.php';

            require_once 'view/operator/updateoperator.php';
        }
    }
}
