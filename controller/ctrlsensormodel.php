<?php
require_once 'dataobject/dosensormodel.php';

class ctrlSensorModel
{

    public function viewsensormodel()
    {

        // if (isset($_POST['where'])) {
        //     $where = array('sensormodel_SN' => $_POST['where']);
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
            // require_once 'view/sensormodel/errorpage.php';
            // return;
        };

        if (isset($_GET['id'])) {
            $where = array('model_name' => $_GET['id']);
            $orderBy = array('name' => 'asc');
        }

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'model_name') {
                $orderBy = array('model_name' => 'asc');
            };
            if ($_POST['order'] == 'model_name') {
                $orderBy = array('model_name' => 'asc'); //TODO: modifica
            };
        } else {
            $orderBy = [];
        };

        require_once 'model/mosensormodel.php';
        $sensormodel = new modelSensorModel();

        try {
            //code...
            $dataset = $sensormodel->select($where, $orderBy);
        } catch (\Throwable $th) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/sensormodel/vwsensormodellist.php';
    }

    public function viewsensormodelall()
    {
        require_once 'model/mosensormodel.php';
        $sensormodel = new modelSensorModel();

        try {
            //code...
            $dataset = $sensormodel->select([], []);
        } catch (\Throwable $th) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/sensormodel/vwsensormodellist.php';
    }

    public function insertsensormodel()
    {
        require_once 'model/mosensormodel.php';
        // $row = new dataobjplantModel($row['model_name']);
        // $plantmodel = new modelPlantModel();
        // $count = $plantmodel->insert($row);
        // require_once 'view/sensormodel/vwplantmodelinserted.php';
        // require_once 'model/moplant.php';

        if (isset($_POST['model_name'])) {

            $row = new dataobjSensorModel($_POST['model_name']);
            $sensormodel = new modelSensorModel();
            try {
                //code...
                $count = $sensormodel->insert($row);
            } catch (\Throwable $th) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/sensormodel/vwsensormodelinserted.php';
        } else {
            require_once 'view/sensormodel/insertsensormodel.php';
        }
    }

    public function deletesensormodel()
    {
        require_once 'model/mosensormodel.php';

        if (isset($_POST['where'])) {
            $where = array('model_name' => $_POST['where']);
            $sensormodel = new modelSensorModel();
            try {
                //code...
                $count = $sensormodel->delete($where);
            } catch (\Throwable $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/sensormodel/vwsensormodeldeleted.php';
        } else {
            require_once 'view/sensormodel/deletesensormodel.php';
            // return;
        };

        // $row = new dataobjsensormodel($_POST['code'], $_POST['address']);

    }
}
