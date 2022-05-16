<?php

/**
 * [Class dataobjOperator] represents the data object of an operator 
 */
class dataobjOperator
{
    /**
     * @param mixed $operator_id
     * @param mixed $name
     * @param mixed $surname
     */
    public function __construct($operator_id, $name, $surname)
    {
        $this->operator_id = $operator_id;
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * @return operator_id
     */
    public function getOperatorId()
    {
        return $this->operator_id;
    }

    /**
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return surname
     */
    public function getSurname()
    {
        return $this->surname;
    }
}
