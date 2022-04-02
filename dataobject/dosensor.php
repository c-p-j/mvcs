<?php
class dataobjSensor
{
    public function __construct($sensor_SN,$status,$NOR,$plant_id,$model_name) {
        
        $this->sensor_SN = $sensor_SN;
        $this->status = $status;
        $this->NOR = $NOR;
        $this->plant_id = $plant_id;
        $this->model_name = $model_name;
        

    } 
    public function getSensorSN()
    {
        return $this->sensor_SN;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function getNOR()
    {
        return $this->NOR;
    }
    public function getPlantId()
    {
        return $this->plant_id;
    }
    public function getModelName()
    {
        return $this->model_name;
    }


    //setters????
}