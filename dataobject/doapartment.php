<?php

/**
 * [Class dataobjApartment] represents the data object of an apartment 
 */
class dataobjApartment
{
    /**
     * @param mixed $apartment_code
     * @param mixed $address
     * @param mixed $active_implants
     */
    public function __construct($apartment_code, $address, $active_implants)
    {
        $this->apartment_code = $apartment_code;
        $this->address = $address;
        $this->active_implants = $active_implants;
    }
    /**
     * @return apartment_code
     */

    public function getApartmentCode()
    {
        return $this->apartment_code; 
    }

    /**
     * @return address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return active_implants
     */
    public function getActiveImplants()
    {
        return $this->active_implants;
    }
}
