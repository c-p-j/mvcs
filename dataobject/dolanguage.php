<?php

class dataobjLanguage
{
private $language_id;
private $name;
private $last_update;

function __construct($language_id, $name, $last_update) 
{
    $this->language_id = $language_id;
    $this->name = $name;
    $this->last_update= $last_update;
}

function getlanguage_id() 
{
    return $this->language_id;
}
function getname() {
    return $this->name;
}
function getlast_update() 
{
    return $this->last_update;
}

function setlanguage_id($language_id) 
{
    $this->language_id = $language_id;
}

function setname($name) 
{
    $this->name = $name;
}

function setlast_update($last_update) 
{
    $this->last_update = $last_update;
}

}

?>
