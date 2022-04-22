<?php
class dataobjApartment
{
    public function __construct($apartment_code, $address, $active_implants)
    {
        $this->apartment_code = $apartment_code;
        $this->address = $address;
        $this->active_implants = $active_implants;
    }
    public function getApartmentCode()
    {
        return $this->apartment_code;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function getActiveImplants()
    {
        return $this->active_implants;
    }
    
    //setters????
}
