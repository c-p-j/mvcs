<?php
class dataobjPlant
{
    public function __construct($plant_id, $status, $name, $NOR, $model_name, $apartment_code)
    {
        $this->plant_id = $plant_id;
        $this->status = $status;
        $this->name = $name;
        $this->NOR = $NOR;
        $this->model_name = $model_name;
        $this->apartment_code = $apartment_code;
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

    //setters????
}
