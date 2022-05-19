<?php

/**
 * [Class dataobjInstallation] represents the data object of an installation 
 */
class dataobjInstallation
{
    /**
     * 
     * The plant and the operators name are returned by a specific query on moinstallation.php
     */

    // private  $dateTime;
    // private string $status = "";
    // private int $plantId = 0;
    // private int $operatorId = 0;
    // private string $plantName = "";
    // private string $operatorName = "";
    public function __construct($dateTime, $plant_id, $operator_id, $status)
    {
        $this->dateTime = $dateTime;
        $this->status = $status;
        $this->plantId = $plant_id;
        $this->operatorId = $operator_id;
    }

    public static function WithName($dateTime, $plant_id, $operator_id, $plant_name, $operator_name, $status)
    {
        $instance = new self($dateTime, $plant_id, $operator_id, $status);
        $instance->setPlantName($plant_name);
        $instance->setOperatorName($operator_name);
        return $instance;
    }



    /**
     * @return dateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @return plant_id
     */
    public function getPlantId()
    {
        return $this->plantId;
    }

    /**
     * @return status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return operator_id
     */
    public function getOperatorId()
    {
        return $this->operatorId;
    }

    /**
     * @return plant_name
     */
    public function getPlantName()
    {
        return $this->plant_name;
    }

    /**
     * @return operator_name
     */
    public function getOperatorName()
    {
        return $this->operator_name;
    }

    private function setPlantName($attr)
    {
        $this->plant_name = $attr;
    }

    private function setOperatorName($attr)
    {
        $this->operator_name = $attr;
    }
}
