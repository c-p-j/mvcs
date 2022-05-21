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

        if (isset($_GET['id'])) {
            $where = array('plant_id' => $_GET['id']);
            $orderBy = array('name' => 'asc');
        }

        //var_dump($_GET);
        //var_dump($_POST);

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'apartment_code') {
                $orderBy = array('apartment_code' => 'asc');
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

        try {
            //code...
            $dataset = $plant->select($where, $orderBy);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/plant/vwplantlist.php';
    }

    public function viewplantall()
    {
        require_once 'model/moplant.php';
        $plant = new modelPlant();

        try {
            //code...
            $dataset = $plant->select([], []);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/plant/vwplantlist.php';
    }

    public function insertplant()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['apartment_code'], $row['active_sensors']);
        // $plant = new modelPlant();

        // require_once 'view/plant/vwplantinserted.php';
        require_once 'model/moplant.php';

        if (isset($_POST['status'], $_POST['name'], $_POST['NOR'], $_POST['model_name'], $_POST['apartment_code']) && !empty($_POST['name'])){
            if (empty($_POST['NOR']))
                $_POST['NOR'] = "NULL";

            $row = new dataobjPlant("NULL", filter_var($_POST['status'], FILTER_VALIDATE_BOOLEAN), $_POST['name'], $_POST['NOR'], $_POST['model_name'], $_POST['apartment_code'], 0);
            $plant = new modelPlant();
            try {
                //code...
                $count = $plant->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/plant/vwplantinserted.php';
        } else {
            require_once 'model/moapartment.php';
            require_once 'model/moplantmodel.php';
            require_once 'view/plant/insertplant.php';
        }
    }

    public function updateplant()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['apartment_code'], $row['active_sensors']);
        // $plant = new modelPlant();

        // require_once 'view/plant/vwplantinserted.php';
        require_once 'model/moplant.php';

        if (isset($_POST['plant_id'])) {
            // $row = new dataobjApartment($_POST['code'], $_POST['address'], $_POST['active_implants']);
            if (empty($_POST['NOR']))
                $_POST['NOR'] = NULL;

            $fields = array('plant_id' => $_POST['plant_id'], 'status' => filter_var($_POST['status'], FILTER_VALIDATE_BOOLEAN), 'name' => $_POST['name'], 'NOR' => $_POST['NOR'], 'model_name' => $_POST['model_name'], 'apartment_code' => $_POST['apartment_code']);
            //status MUST be converted into a boolean
            
            // $fields->array_push('address' => $_POST['address']);
            // //var_dump($fields);
            $plant = new modelPlant();
            try {
                //code...
                $count = $plant->update($fields);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/plant/vwplantupdated.php';
        } else {
            require_once 'model/moapartment.php';
            require_once 'model/moplantmodel.php';
            require_once 'view/plant/updateplant.php';
        }
    }

    public function deleteplant()
    {
        require_once 'model/moplant.php';

        if (isset($_POST['where'])) {
            $where = array('plant_id' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/errorpage.php';
            return;
        };
        $plant = new modelPlant();
        try {
            //code...
            $count = $plant->delete($where);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/plant/vwplantdeleted.php';
    }
}
