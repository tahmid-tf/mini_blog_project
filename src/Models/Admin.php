<?php

namespace Models;

class Admin extends User{
    public function getRole()
    {
        return "admin";
    }
}