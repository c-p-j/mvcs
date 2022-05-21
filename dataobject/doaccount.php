<?php

/**
 * [Class dataobjaccount] represents the data object of an account 
 */
class dataobjAccount
{
    /**
     * @param mixed $account_code
     * @param mixed $address
     * @param mixed $active_implants
     */
    public function __construct($username, $password, $type)
    {
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
    }
    /**
     * @return username
     */

    public function getUsername()
    {
        return $this->username; 
    }

    /**
     * @return password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return type
     */
    public function getType()
    {
        return $this->type;
    }
}
