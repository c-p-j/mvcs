<?php
class dataobjOperator
{
    public function __construct($operator_id, $name, $surname)
    {
        $this->operator_id = $operator_id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getOperatorId()
    {
        return $this->operator_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    //setters????
}
