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

    public function insertinstallation()
    {
        require_once 'model/moinstallation.php';
        // $row = new dataobjInstallation($_POST['code'], $_POST['name'], $_POST['surname']);
        // $installation = new modelInstallation();
        // $count = $installation->insert($row);
        // require_once 'view/vwinstallationinserted.php';
        // require_once 'model/mooperator.php';
        // $row = new dataobjOperator($_POST['code'], $_POST['name'], $_POST['surname']);
        // $operator = new modeloperator();
        // $count = $operator->insert($row);
        // require_once 'model/moplant.php';

        if (isset($_POST['datetime'], $_POST['plant_id'], $_POST['operator_id'])) {

            $row = new dataobjInstallation(date('Y-m-d', $_POST['datetime']), $_POST['plant_id'], $_POST['operator_id']);
            $installation = new modelInstallation();
            $count = $installation->insert($row);
            require_once 'view/vwinstallationinserted.php';
        } else {
            require_once 'model/moplant.php';
            require_once 'model/mooperator.php';
            require_once 'view/insertinstallation.php';
        }
    }
}
