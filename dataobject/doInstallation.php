<?php

/**
 * [Class dataobjInstallation] represents the data object of an installation 
 */
class dataobjInstallation
{
    /**
     * @param mixed $dateTime
     * @param mixed $plant_id
     * @param mixed $operator_id
     * @param mixed $status
     * 
     * The plant and the operators name are returned by a specific query on moinstallation.php
     */
    public function __construct($dateTime, $plant_id, $operator_id, $status)
    {
        $this->dateTime = $dateTime;
        $this->plant_id = $plant_id;
        $this->operator_id = $operator_id;
        $this->status = $status;
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
        return $this->plant_id;
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
        return $this->operator_id;
    }
}
