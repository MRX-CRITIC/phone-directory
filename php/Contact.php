<?php

class Contact
{
    public $name;
    public $phoneNumber;

    public function __construct($name, $phoneNumber)
    {
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
    }
}