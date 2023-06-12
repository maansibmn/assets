<?php

namespace App\Interfaces;

interface AttachmentInterface
{
    public function all();
    public function getById($id);
    public function getByAttachableId($attachable_id);
    public function delete($id);
    public function deleteByAttachableId($attachable_id);
    public function store($request);
}
