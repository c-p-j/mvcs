<?php
class dataobjApartment
{
    public function __construct($apartment_code, $address) {
        $this->apartment_code = $apartment_code;
        $this->address = $address;
    } 
    public function getApartmentCode()
    {
        return $this->apartment_code;
    }
    public function getAddress()
    {
        return $this->address;
    }

    //setters????
}
