<?php

namespace App\Interfaces;

interface AssetInterface
{
    public function all();
    public function store($request);
    public function getById($id);
    public function update($request);
    public function delete($id);
    public function getLastRecord();
    public function getLastAssetNumber();

}
