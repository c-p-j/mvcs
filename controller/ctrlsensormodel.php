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
            // require_once 'view/errorpage.php';
            // return;
        };
        var_dump($_GET);
        var_dump($_POST);

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
        $dataset = $sensormodel->select($where, $orderBy);
        require_once 'view/vwsensormodellist.php';
    }

    public function viewsensormodelall()
    {
        require_once 'model/mosensormodel.php';
        $sensormodel = new modelSensorModel();
        $dataset = $sensormodel->select([], []);
        require_once 'view/vwsensormodellist.php';
    }

    public function insertsensormodel()
    {
        require_once 'model/mosensormodel.php';
        // $row = new dataobjplantModel($row['model_name']);
        // $plantmodel = new modelPlantModel();
        // $count = $plantmodel->insert($row);
        // require_once 'view/vwplantmodelinserted.php';
        // require_once 'model/moplant.php';

        if (isset($_POST['model_name'])) {
    
            $row = new dataobjSensorModel($_POST['model_name']);
            $plant = new modelSensorModel();
            $count = $plant->insert($row);
            require_once 'view/vwsensormodelinserted.php';
        }else{
            require_once 'view/insertsensormodel.php';
        }
    }

    public function deletesensormodel()
    {
        require_once 'model/mosensormodel.php';

        if (isset($_POST['where'])) {
            $where = array('model_name' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/error.php';
            return;
        };

        // $row = new dataobjsensormodel($_POST['code'], $_POST['address']);
        $sensormodel = new modelSensorModel();
        $count = $sensormodel->delete($where);
        require_once 'view/vwsensormodeldeleted.php';
    }
}
