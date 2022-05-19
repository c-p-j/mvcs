<?php
class dataobjSensor
{
    public function __construct($sensor_SN, $status, $NOR, $plant_id, $plant_name, $model_name)
    {

        $this->sensor_SN = $sensor_SN;
        $this->status = $status;
        $this->NOR = $NOR;
        $this->plant_id = $plant_id;
        $this->plant_name = $plant_name;
        $this->model_name = $model_name;
    }
    public function getSensorSN()
    {
        return $this->sensor_SN;
    }

    public function getStatus()
    {
        if ($this->status) return "Operational";
        return "Non Operational";
    }

    function getStatusBool()
    {
        return $this->status;
    }

    public function getNOR()
    {
        if ($this->NOR == null) return "N/A";
        return $this->NOR;
    }
    public function getPlantId()
    {
        return $this->plant_id;
    }

    public function getPlantName()
    {
        return $this->plant_name;
    }

    public function getModelName()
    {
        return $this->model_name;
    }


    //setters????
}
