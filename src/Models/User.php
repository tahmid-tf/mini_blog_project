<?php
namespace Models;

abstract class User{
    protected $id;
    protected $name;

    public function __construct($id = null, $name = 'Guest')
    {
        $this->id = $id;
        $this->name = $name;
    }

    abstract public function getRole();

    public function getName()
    {
        return $this->name;
    }
}