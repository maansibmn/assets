<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory, SoftDeletes;
    protected $softDelete = true;
    protected $fillable = ['asset_name', 'asset_number', 'asset_description', 'asset_type', 'brand_name', 'date_of_purchase', 'purchase_amount', 'dealer_name', 'invoice'];

    public function attachments() {
        return $this->hasMany(Attachment::class, 'attachable_id', 'id');
    }

}



