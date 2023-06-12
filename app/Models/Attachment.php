<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image_name','storage_path','path','type','attachable_id','attachable_type'];

    protected $softDelete = true;

//    public function asset() {
//        return $this->belongsTo(Attachment::class, 'id', 'attachable_id');
//    }

}
