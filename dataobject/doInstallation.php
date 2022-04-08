<?php
class dataobjInstallation
{
    public function __construct($dateTime, $plant_name, $operator_name, $plant_id, $operator_id)
    {
        $this->dateTime = $dateTime;
        $this->plant_id = $plant_id;
        $this->operator_id = $operator_id;
        $this->plant_name = $plant_name;
        $this->operator_name = $operator_name;
        //the plant and the operators name are returned by a specific query on moinstallation.php
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function getPlantId() 
    {
        return $this->plant_id;
    }

    public function getPlantName() 
    {
        return $this->plant_name;
    }

    public function getOperatorName()
    {
        return $this->operator_name;
    }

    public function getOperatorId()
    {
        return $this->operator_id;
    }

    //setters????
}
