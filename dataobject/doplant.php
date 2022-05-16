<?php

/**
 * [Class dataobjPlant] represents the data object of a plant 
 */
class dataobjPlant
{
    public function __construct($plant_id, $status, $name, $NOR, $model_name, $apartment_code, $active_sensors)
    {
        $this->plant_id = $plant_id;
        $this->status = $status;
        $this->name = $name;
        $this->NOR = $NOR;
        $this->model_name = $model_name;
        $this->apartment_code = $apartment_code;
        $this->active_sensors = $active_sensors;
    }
    public function getPlantId()
    {
        return $this->plant_id;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getNOR()
    {
        return $this->NOR;
    }
    public function getModelName()
    {
        return $this->model_name;
    }
    public function getApartmentCode()
    {
        return $this->apartment_code;
    }

    public function getActiveSensors()
    {
        return $this->active_sensors;
    }

    //setters????
}
