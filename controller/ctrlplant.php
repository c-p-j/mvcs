<?php
require_once 'dataobject/doplant.php';

class ctrlPlant
{

    public function viewplant()
    {

        // if (isset($_POST['where'])) {
        //     $where = array('plant_code' => $_POST['where']);
        //     $orderBy = array('name' => 'asc');
        // } else {
        //     $where = [];
        //     $orderBy = [];
        // };
        if (isset($_POST['where'])) {
            $where = array('apartment_code' => $_POST['where']);
            $orderBy = array('name' => 'asc');
        } else {
            $where = [];
            $orderBy = [];
        };
        var_dump($_GET);
        var_dump($_POST);

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'plant_code') {
                $orderBy = array('plant_code' => 'asc');
            };
            if ($_POST['order'] == 'address') {
                $orderBy = array('address' => 'asc'); //TODO: modifica
            };
        } else {
            $orderBy = [];
        };

        require_once 'model/moplant.php';
        $plant = new modelPlant();
        $dataset = $plant->select($where, $orderBy);
        require_once 'view/vwplantlist.php';
    }

    public function viewplantall()
    {
        require_once 'model/moplant.php';
        $plant = new modelPlant();
        $dataset = $plant->select([], []);
        require_once 'view/vwplantlist.php';
    }

    public function insertplant()
    {
        require_once 'model/moplant.php';
        $row = new dataobjPlant($row['plant_id'],$row['status'],$row['name'],$row['NOR'],$row['model_name'],$row['apartment_code']);
        $plant = new modelPlant();
        $count = $plant->insert($row);
        require_once 'view/vwplantinserted.php';
    }
}
