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
            // require_once 'view/errorpage.php';
            // return;
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
        // $row = new dataobjSensor($row['sensor_SN'], $row['status'], $row['NOR'], $row['plant_id'], $row['model_name']);
        // $sensor = new modelSensor();
        // $count = $sensor->insert($row);
        // require_once 'view/vwsensorinserted.php';
        // require_once 'model/moplant.php';

        if (isset( $_POST['sensor_SN'], $_POST['status'], $_POST['NOR'], $_POST['plant_id'], $_POST['model_name'])) {
            if (empty($_POST['NOR']))
                $_POST['NOR'] = "NULL";
    
            $row = new dataobjSensor($_POST['sensor_SN'], $_POST['status'], $_POST['NOR'], $_POST['plant_id'], $_POST['model_name']);
            $plant = new modelSensor();
            $count = $plant->insert($row);
            require_once 'view/vwsensorinserted.php';
        }else{
            require_once 'model/moplant.php';
            require_once 'model/mosensormodel.php';
            require_once 'view/insertsensor.php';
        }
    }

    public function deletesensor()
    {
        require_once 'model/mosensor.php';

        if (isset($_POST['where'])) {
            $where = array('sensor_SN' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/error.php';
            return;
        };

        // $row = new dataobjsensor($_POST['code'], $_POST['address']);
        $sensor = new modelSensor();
        $count = $sensor->delete($where);
        require_once 'view/vwsensordeleted.php';
    }
}
