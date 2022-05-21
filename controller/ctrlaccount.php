<?php
require_once 'dataobject/doaccount.php';

/**
 * [Class ctrlaccount]
 */
class ctrlaccount
{

    public function viewprofile(){
        require_once 'view/profile.php';
    }

    public function viewaccount()
    {

        if (isset($_POST['where'])) {
            $where = array('username' => $_POST['where']);
            $orderBy = array('name' => 'asc');
        } else {
            $where = [];
            $orderBy = [];
        };
        // //var_dump($_GET);
        // //var_dump($_POST);

        if (isset($_GET['id'])) {
            $where = array('username' => $_GET['id']);
            $orderBy = array('username' => 'asc');
        }

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'username') {
                $orderBy = array('username' => 'asc');
            };
            if ($_POST['order'] == 'username') {
                $orderBy = array('username' => 'asc'); //TODO: modifica
            };
        } else {
            $orderBy = [];
        };


        require_once 'model/moaccount.php';
        $account = new modelAccount();

        try {
            $dataset = $account->select($where, $orderBy);
        } catch (PDOException $e) {
            require_once 'view/errordb.php';
            return;
        }
        require_once 'view/account/vwaccountlist.php';
    }

    public function viewaccountall()
    {
        require_once 'model/moaccount.php';
        $account = new modelAccount();
        $dataset = $account->select([], []);
        require_once 'view/account/vwaccountlist.php';
    }

    public function insertaccount()
    {
        // $row = new dataobjPlant($row['plant_id'], $row['status'], $row['name'], $row['NOR'], $row['model_name'], $row['username'], $row['active_sensors']);
        // $plant = new modelPlant();
        // $count = $plant->insert($row);
        // require_once 'view/account/vwplantinserted.php';
        require_once 'model/moaccount.php';

        $options = [
            'cost' => 12
        ];

        if (isset($_POST['username'], $_POST['password'], $_POST['type'])) {
            $row = new dataobjaccount($_POST['username'], password_hash($_POST['password'], PASSWORD_BCRYPT, $options), $_POST['type']);

            //var_dump($row);
            $account = new modelAccount();
            try {
                $count = $account->insert($row);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/account/vwaccountinserted.php';
        } else {
            require_once 'view/account/insertaccount.php';
        }
    }

    public function deleteaccount()
    {
        require_once 'model/moaccount.php';

        if (isset($_POST['where'])) {
            $where = array('username' => $_POST['where']);
            // $row = new dataobjaccount($_POST['code'], $_POST['address']);
            $account = new modelAccount();
            
            try {
                $count = $account->delete($where);
            } catch (PDOException $e) {
                require_once 'view/errordb.php';
                return;
            }
            require_once 'view/account/vwaccountdeleted.php';
        } else {
            require_once 'view/account/deleteaccount.php';
        }
    }
}
