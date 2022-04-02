<?php
require_once 'dataobject/dosensor.php';

class ctrlsensor
{

    public function viewsensor()
    {

        // if (isset($_POST['where'])) {
        //     $where = array('sensor_SN' => $_POST['where']);
        //     $orderBy = array('name' => 'asc');
        // } else {
        //     $where = [];
        //     $orderBy = [];
        // };
        if (isset($_POST['where'])) {
            $where = array('plant_id' => $_POST['where']);
            $orderBy = array('plant_id' => 'asc');
        } else {
            $where = [];
            $orderBy = [];
        };
        var_dump($_GET);
        var_dump($_POST);

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'sensor_SN') {
                $orderBy = array('sensor_SN' => 'asc');
            };
            if ($_POST['order'] == 'address') {
                $orderBy = array('address' => 'asc'); //TODO: modifica
            };
        } else {
            $orderBy = [];
        };

        require_once 'model/mosensor.php';
        $sensor = new modelSensor();
        $dataset = $sensor->select($where, $orderBy);
        require_once 'view/vwsensorlist.php';
    }

    public function viewsensorall()
    {
        require_once 'model/mosensor.php';
        $sensor = new modelSensor();
        $dataset = $sensor->select([], []);
        require_once 'view/vwsensorlist.php';
    }

    public function insertsensor()
    {
        require_once 'model/mosensor.php';
        $row = new dataobjSensor($row['sensor_SN'],$row['status'],$row['NOR'],$row['plant_id'],$row['model_name']);
        $sensor = new modelSensor();
        $count = $sensor->insert($row);
        require_once 'view/vwsensorinserted.php';
    }
}

