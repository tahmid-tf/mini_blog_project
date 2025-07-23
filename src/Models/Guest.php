<?php

namespace Models;

class Guest extends User
{
    public function getRole()
    {
        return 'guest';
    }
}