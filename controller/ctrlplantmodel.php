<?php
require_once 'dataobject/doplantmodel.php';

class ctrlPlantModel
{

    public function viewplantmodel()
    {

        // if (isset($_POST['where'])) {
        //     $where = array('plantmodel_SN' => $_POST['where']);
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
            // require_once 'view/plantmodel/errorpage.php';
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

        require_once 'model/moplantmodel.php';
        $plantmodel = new modelPlantModel();
        $dataset = $plantmodel->select($where, $orderBy);
        require_once 'view/plantmodel/vwplantmodellist.php';
    }

    public function viewplantmodelall()
    {
        require_once 'model/moplantmodel.php';
        $plantmodel = new modelPlantModel();
        $dataset = $plantmodel->select([], []);
        require_once 'view/plantmodel/vwplantmodellist.php';
    }

    public function insertplantmodel()
    {
        require_once 'model/moplantmodel.php';
        // $row = new dataobjplantModel($row['model_name']);
        // $plantmodel = new modelPlantModel();
        // $count = $plantmodel->insert($row);
        // require_once 'view/plantmodel/vwplantmodelinserted.php';
        // require_once 'model/moplant.php';

        if (isset($_POST['model_name'])) {
    
            $row = new dataobjPlantModel($_POST['model_name']);
            $plant = new modelPlantModel();
            $count = $plant->insert($row);
            require_once 'view/plantmodel/vwplantmodelinserted.php';
        }else{
            require_once 'view/plantmodel/insertplantmodel.php';
        }
    }

    public function deleteplantmodel()
    {
        require_once 'model/moplantmodel.php';

        if (isset($_POST['where'])) {
            $where = array('model_name' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/error.php';
            return;
        };

        // $row = new dataobjplantmodel($_POST['code'], $_POST['address']);
        $plantmodel = new modelPlantModel();
        $count = $plantmodel->delete($where);
        require_once 'view/plantmodel/vwplantmodeldeleted.php';
    }
}
