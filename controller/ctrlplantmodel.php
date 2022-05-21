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
                $orderBy = array('model_name' => 'asc'); 
            };
        } else {
            $orderBy = [];
        };

        require_once 'model/moplantmodel.php';
        $plantmodel = new modelPlantModel();

        try {
            //code...
            $dataset = $plantmodel->select($where, $orderBy);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/plantmodel/vwplantmodellist.php';
    }

    public function viewplantmodelall()
    {
        require_once 'model/moplantmodel.php';
        $plantmodel = new modelPlantModel();
        try {
            //code...
            $dataset = $plantmodel->select([], []);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/plantmodel/vwplantmodellist.php';
    }

    public function insertplantmodel()
    {
        require_once 'model/moplantmodel.php';
        // $row = new dataobjplantModel($row['model_name']);
        // $plantmodel = new modelPlantModel();
        // require_once 'view/plantmodel/vwplantmodelinserted.php';
        // require_once 'model/moplant.php';

        if (isset($_POST['model_name'])) {

            $row = new dataobjPlantModel($_POST['model_name']);
            $plantmodel = new modelPlantModel();
            try {
                //code...
                $count = $plantmodel->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/plantmodel/vwplantmodelinserted.php';
        } else {
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
            require_once 'view/errorpage.php';
            return;
        };

        // $row = new dataobjplantmodel($_POST['code'], $_POST['address']);
        $plantmodel = new modelPlantModel();
        try {
            //code...
            $count = $plantmodel->delete($where);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/plantmodel/vwplantmodeldeleted.php';
    }
}
