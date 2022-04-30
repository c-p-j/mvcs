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
        var_dump($_GET);
        var_dump($_POST);

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
        $dataset = $operator->select($where, $orderBy);
        require_once 'view/vwoperatorlist.php';
    }

    public function viewoperatorall()
    {
        require_once 'model/mooperator.php';
        $operator = new modeloperator();
        $dataset = $operator->select([], []);
        require_once 'view/vwoperatorlist.php';
    }

    public function insertoperator()
    {
        require_once 'model/mooperator.php';
        // $row = new dataobjOperator($_POST['code'], $_POST['name'], $_POST['surname']);
        // $operator = new modeloperator();
        // $count = $operator->insert($row);
        // require_once 'model/moplant.php';

        if (isset($_POST['name'], $_POST['surname'])) {

            $row = new dataobjOperator(NULL, $_POST['name'], $_POST['surname']);
            $operator = new modeloperator();
            $count = $operator->insert($row);
            require_once 'view/vwoperatorinserted.php';
        } else {
            // require_once 'model/moapartment.php';
            // require_once 'model/moplantmodel.php';
            require_once 'view/insertoperator.php';
        }
    }

    public function deleteoperator()
    {
        require_once 'model/moapartment.php';

        if (isset($_POST['where'])) {
            $where = array('operator_id' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/error.php';
            return;
        };

        // $row = new dataobjApartment($_POST['code'], $_POST['address']);
        $operator = new modelApartment();
        $count = $apartment->delete($where);
        // require_once 'view/vwaoperatordeleted.php'; //TODO: modifica
    }
}
