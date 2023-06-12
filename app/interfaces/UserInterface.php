<?php

namespace App\Interfaces;

interface UserInterface
{
    public function getById($id);
    public function getByInfo($request);

}
