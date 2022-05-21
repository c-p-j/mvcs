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
            // require_once 'view/sensor/errorpage.php';
            // return;
        };

        if (isset($_GET['id'])) {
            $where = array('sensorSN' => $_GET['id']);
            $orderBy = array('name' => 'asc');
        }

        //var_dump($_GET);
        //var_dump($_POST);

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
        // $dataset = $sensor->select($where, $orderBy);
        try {
            //code...
            $dataset = $sensor->select($where, $orderBy);
            //var_dump($dataset);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/sensor/vwsensorlist.php';
    }

    public function viewsensorall()
    {
        require_once 'model/mosensor.php';
        $sensor = new modelSensor();
        // $dataset = $sensor->select([], []);
        try {
            //code...
            $dataset = $sensor->select([], []);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/sensor/vwsensorlist.php';
    }

    public function insertsensor()
    {
        require_once 'model/mosensor.php';
        // 
        // require_once 'view/sensor/vwsensorinserted.php';
        // require_once 'model/moplant.php';

        if (isset($_POST['sensor_SN'], $_POST['status'], $_POST['NOR'], $_POST['plant_id'], $_POST['model_name']) && !empty($_POST['sensor_SN'])) {
            if (!empty($_POST['NOR']))
                $_POST['NOR'] = "'" . $_POST["NOR"] . "'";
            else
                $_POST['NOR'] = "NULL";
            // if (empty($_POST['NOR']))
            //     $_POST['NOR'] = "NULL";

            $row = new dataobjSensor($_POST['sensor_SN'], filter_var($_POST['status'], FILTER_VALIDATE_BOOLEAN), $_POST['NOR'], $_POST['plant_id'], $_POST['model_name']);

            //var_dump($row);
            $sensor = new modelSensor();

            try {
                //code...
                $count = $sensor->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/sensor/vwsensorinserted.php';
        } else {
            require_once 'model/moplant.php';
            require_once 'model/mosensormodel.php';
            require_once 'view/sensor/insertsensor.php';
        }
    }

    public function deletesensor()
    {
        require_once 'model/mosensor.php';

        if (isset($_POST['where'])) {
            $where = array('sensor_SN' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/errorpage.php';
            return;
        };

        // $row = new dataobjsensor($_POST['code'], $_POST['address']);
        $sensor = new modelSensor();
        try {
            //code...
            $count = $sensor->delete($where);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/sensor/vwsensordeleted.php';
    }


    public function updatesensor()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['apartment_code'], $row['active_sensors']);
        // $plant = new modelPlant();
        // $count = $plant->insert($row);
        // require_once 'view/sensor/vwplantinserted.php';
        require_once 'model/mosensor.php';

        if (isset($_POST['sensor_SN'])) {
            // $row = new dataobjApartment($_POST['code'], $_POST['address'], $_POST['active_implants']);
            if (empty($_POST['NOR']))
                $_POST['NOR'] = NULL;

            $fields = array(
                'sensor_SN' => $_POST['sensor_SN'],
                'status' => filter_var($_POST['status'], FILTER_VALIDATE_BOOLEAN), //status MUST be a boolean
                'NOR' => $_POST['NOR'],
                'plant_id' => $_POST['plant_id'],
                'model_name' => $_POST['model_name']
            );

            // if(isset($_POST['address']))
            // $fields->array_push('address' => $_POST['address']);
            $sensor = new modelSensor();
            try {
                //code...
                $count = $sensor->update($fields);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/sensor/vwsensorupdated.php';
        } else {
            require_once 'model/moplant.php';
            require_once 'model/mosensormodel.php';
            require_once 'view/sensor/updatesensor.php';
        }
    }
}
