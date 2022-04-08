<?php
require_once 'dataobject/doapartment.php';

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
        var_dump($_GET);
        var_dump($_POST);

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
        $dataset = $apartment->select($where, $orderBy);
        require_once 'view/vwapartmentlist.php';
    }

    public function viewapartmentall()
    {
        require_once 'model/moapartment.php';
        $apartment = new modelApartment();
        $dataset = $apartment->select([], []);
        require_once 'view/vwapartmentlist.php';
    }

    public function insertapartment()
    {
        require_once 'model/moapartment.php';
        $row = new dataobjApartment($_POST['code'], $_POST['address']);
        $apartment = new modelApartment();
        $count = $apartment->insert($row);
        require_once 'view/vwapartmentinserted.php';
    }

    public function deleteapartment()
    {
        require_once 'model/moapartment.php';
        
        if (isset($_POST['where'])) {
            $where = array('apartment_code' => $_POST['where']);
        } else {
            $where = [];
        };

        // $row = new dataobjApartment($_POST['code'], $_POST['address']);
        $apartment = new modelApartment();
        $apartment->delete($where);
        // require_once 'view/vwapartmentinserted.php';
    }
}
