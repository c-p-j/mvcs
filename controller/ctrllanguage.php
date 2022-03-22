<?php
require_once 'dataobject/dolanguage.php';

class ctrllanguage
{

    public function viewlanguage()
    {

        if (isset($_POST['where'])) {
            $where = array('language_id' => $_POST['where']);
            $orderBy = array('name' => 'asc');
        } else {
            $where = [];
            $orderBy = [];
        };
        var_dump($_GET);
        var_dump($_POST);

        if (isset($_POST['order'])) {
            if ($_POST['order'] == 'codice') {
                $orderBy = array('language_id' => 'asc');
            };
            if ($_POST['order'] == 'descrizione') {
                $orderBy = array('name' => 'asc');
            };
        } else {
            $orderBy = [];
        };

        require_once 'model/molanguage.php';
        $language = new modelLanguage();
        $dataset = $language->select($where, $orderBy);
        require_once 'view/vwlanguagelist.php';
    }

    public function viewlanguageall()
    {
        require_once 'model/molanguage.php';
        $language = new modelLanguage();
        $dataset = $language->select([], []);
        require_once 'view/vwlanguagelist.php';
    }

    public function insertlanguage()
    {
        require_once 'model/molanguage.php';
        $row = new dataobjLanguage($_POST['codice'], $_POST['descrizione'], date('Y-m-d H:i:s'));
        $language = new modelLanguage();
        $count = $language->insert($row);
        require_once 'view/vwlanguageinserted.php';
    }
}
