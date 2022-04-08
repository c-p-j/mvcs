<?php
require_once 'dataobject/doinstallation.php';

class ctrlinstallation
{

    // public function viewinstallation()
    // {

    //     if (isset($_POST['where'])) {
    //         $where = array('installation_id' => $_POST['where']);
    //         $orderBy = array('name' => 'asc');
    //     } else {
    //         $where = [];
    //         $orderBy = [];
    //     };
    //     var_dump($_GET);
    //     var_dump($_POST);

    //     if (isset($_POST['order'])) {
    //         if ($_POST['order'] == 'installation_id') {
    //             $orderBy = array('installation_id' => 'asc');
    //         };
    //         if ($_POST['order'] == 'name') {
    //             $orderBy = array('name' => 'asc');
    //         };
    //         if ($_POST['order'] == 'surname') {
    //             $orderBy = array('name' => 'asc');
    //         };
    //     } else {
    //         $orderBy = [];
    //     };

    //     require_once 'model/moinstallation.php';
    //     $installation = new modelinstallation();
    //     $dataset = $installation->select($where, $orderBy);
    //     require_once 'view/vwinstallationlist.php';
    // }

    public function viewinstallationall()
    {
        require_once 'model/moinstallation.php';
        $installation = new modelInstallation();
        $dataset = $installation->select([], []);
        require_once 'view/vwinstallationlist.php';
    }

    // public function insertinstallation()
    // {
    //     require_once 'model/moinstallation.php';
    //     $row = new dataobjInstallation($_POST['code'], $_POST['name'], $_POST['surname']);
    //     $installation = new modelInstallation();
    //     $count = $installation->insert($row);
    //     require_once 'view/vwinstallationinserted.php';
    // }
}
