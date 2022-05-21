<?php
require_once 'dataobject/doinstallation.php';

/**
 * [Class ctrlinstallation]
 */
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
    //     //var_dump($_GET);
    //     //var_dump($_POST);

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
    //     require_once 'view/installation/vwinstallationlist.php';
    // }

    /**
     * Function used to retrieve all installations
     */
    public function viewinstallationall()
    {
        require_once 'model/moinstallation.php';
        $installation = new modelInstallation();

        try {
            //code...
            $dataset = $installation->select([], []);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/installation/vwinstallationlist.php';
    }

    /**
     * Function used to insert a certain installation
     */
    public function insertinstallation()
    {
        require_once 'model/moinstallation.php';

        if (isset($_POST['datetime'], $_POST['plant_id'], $_POST['operator_id'], $_POST['status'])) {

            $row = new dataobjInstallation($_POST['datetime'], $_POST['plant_id'], $_POST['operator_id'], $_POST['status']);
            $installation = new modelInstallation();
            try {
                //code...
                $count = $installation->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/installation/vwinstallationinserted.php';
        } else {
            require_once 'model/moplant.php';
            require_once 'model/mooperator.php';
            require_once 'view/installation/insertinstallation.php';
        }
    }

    /**
     * Function used to delete a certain installation
     */
    public function deleteinstallation()
    {
        require_once 'model/moinstallation.php';

        if (isset($_POST['wherePlant'], $_POST['whereOperator']) /* && $_SESSION['type'] >= EDIT_LEVEL */) {
            $where = array('plant_id' => $_POST['wherePlant'], 'operator_id' => $_POST['whereOperator']); // expected given parameters
        } else {
            $where = [];
            require_once 'view/errorpage.php';
            return;
        };

        //var_dump($where);
        $installation = new modelInstallation();
        $installationModel = $installation->select($where, []);
        //var_dump($installationModel);
        $count = 0;

        if ($installationModel[0]->getStatus() === "Pending") // works with one row only
            try {
                //code...
                $count = $installation->delete($where); // deletion of the installation via a query
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
        require_once 'view/installation/vwinstallationdeleted.php';
    }

    /**
     * Function used to update a certain installation
     */
    public function updateinstallation()
    {
        require_once 'model/moinstallation.php';

        if (isset($_POST['plant_id'], $_POST['operator_id'])) {
            $fields = array('plant_id' => (int)$_POST['plant_id'], 'operator_id' => (int)$_POST['operator_id'], 'status' => $_POST['status'], 'datetime' => $_POST['datetime']); // array with the fields that are going to be updated

            //var_dump($fields);
            $installation = new modelInstallation();
            try {
                //code...
                $count = $installation->update($fields);  // updates the fields via a query
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/installation/vwinstallationupdated.php';
        } else {
            require_once 'model/moplant.php';
            require_once 'model/mooperator.php';
            require_once 'view/installation/updateinstallation.php'; // runs the update page
        }
    }
}
