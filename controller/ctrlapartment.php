<?php
require_once 'dataobject/doapartment.php';

/**
 * [Class ctrlapartment]
 */
class ctrlapartment
{

    public function viewapartment()
    {

        if (isset($_POST['where'])) {
            $where = array('apartment_code' => $_POST['where']);
            $orderBy = array('name' => 'asc');
        } else {
            $where = [];
            $orderBy = [];
        };
        // //var_dump($_GET);
        // //var_dump($_POST);

        if (isset($_GET['id'])) {
            $where = array('apartment_code' => $_GET['id']);
            $orderBy = array('name' => 'asc');
        }

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

        require_once 'model/moapartment.php';
        $apartment = new modelApartment();

        try {
            $dataset = $apartment->select($where, $orderBy);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/apartment/vwapartmentlist.php';
    }

    public function viewapartmentall()
    {
        require_once 'model/moapartment.php';
        $apartment = new modelApartment();
        $dataset = $apartment->select([], []);
        require_once 'view/apartment/vwapartmentlist.php';
    }

    public function insertapartment()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['apartment_code'], $row['active_sensors']);
        // $plant = new modelPlant();
        // $count = $plant->insert($row);
        // require_once 'view/apartment/vwplantinserted.php';
        require_once 'model/moapartment.php';

        if (isset($_POST['code'], $_POST['address'], $_POST['active_implants'])) {
            $row = new dataobjApartment($_POST['code'], $_POST['address'], $_POST['active_implants']);
            $apartment = new modelApartment();
            try {
                $count = $apartment->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/apartment/vwapartmentinserted.php';
        } else {
            require_once 'view/apartment/insertapartment.php';
        }
    }

    public function updateapartment()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['apartment_code'], $row['active_sensors']);
        // $plant = new modelPlant();
        // $count = $plant->insert($row);
        // require_once 'view/apartment/vwplantinserted.php';
        require_once 'model/moapartment.php';

        if (isset($_POST['apartment_code'])) {
            // $row = new dataobjApartment($_POST['code'], $_POST['address'], $_POST['active_implants']);
            $fields = array('apartment_code' => $_POST['apartment_code'], 'address' => $_POST['address']);
            // if(isset($_POST['address']))
            // $fields->array_push('address' => $_POST['address']);
            $apartment = new modelApartment();
            try {
                $count = $apartment->update($fields);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/apartment/vwapartmentinserted.php';
        } else {
            require_once 'view/apartment/updateapartment.php';
        }
    }

    public function deleteapartment()
    {
        require_once 'model/moapartment.php';

        if (isset($_POST['where'])) {
            $where = array('apartment_code' => $_POST['where']);
        } else {
            $where = [];
            require_once 'view/errorpage.php';
            return;
        };

        // $row = new dataobjApartment($_POST['code'], $_POST['address']);
        $apartment = new modelApartment();
        try {
            $count = $apartment->delete($where);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/apartment/vwapartmentdeleted.php';
    }
}
