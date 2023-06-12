<?php

namespace App\Repositories;

use App\Interfaces\AssetInterface;
use App\Models\Asset;

class AssetRepository implements AssetInterface
{
    public function all() {
        return Asset::all();
    }

    public function store($request) {
        // get asset number
        $lastNumber = $this->getLastAssetNumber();

        $asset_type_other = NULL;
        if($request->asset_type == 'Other') {
            $asset_type_other = $request->otherAsset;
        }

        $asset = new Asset;
        $asset->asset_name = $request->asset_name;
        $asset->asset_number = $lastNumber;
        $asset->asset_description = $request->asset_description;
        $asset->asset_type = $request->asset_type;
        $asset->asset_type_other = $asset_type_other;
        $asset->brand_name = $request->brand_name;
        $asset->date_of_purchase = $request->date_of_purchase;
        $asset->purchase_amount = $request->purchase_amount;
        $asset->dealer_name = $request->dealer_name;
        $asset->invoice = $request->invoice;
        if($asset->save()) {
            return  $asset;
        }

        return false;
    }

    public function getById($id) {
        return Asset::findOrFail($id);
    }

    public function update($request) {
        $asset = $this->getById($request->id);

        $asset_type_other = NULL;
        if($request->asset_type == 'Other') {
            $asset_type_other = $request->otherAsset;
        }

        $asset->asset_name = $request->asset_name;
        $asset->asset_description = $request->asset_description;
        $asset->asset_type = $request->asset_type;
        $asset->asset_type_other = $asset_type_other;
        $asset->brand_name = $request->brand_name;
        $asset->date_of_purchase = $request->date_of_purchase;
        $asset->purchase_amount = $request->purchase_amount;
        $asset->dealer_name = $request->dealer_name;
        $asset->invoice = $request->invoice;
        if($asset->save()) {
            return $asset;
        }
        return false;
    }

    public function delete($request) {
        $asset =  $this->getById($request->id);
        if($asset->delete()) {
            return true;
        }
        return false;
    }

    public function getLastRecord() {
        return Asset::latest()->first();
    }

    public function getLastAssetNumber() {
        if($lastRow = $this->getLastRecord()) {
            $lastNumber = explode('-', $lastRow['asset_number']);
            $last = $lastNumber[1];
            ++$last;
        }else{
            $last = 001;
        }

        // pad a string with 2 initial zeros
        $lastNumber = str_pad($last,3,"0",STR_PAD_LEFT);
        $lastNumber = env('ASSET_NUMBER') . $lastNumber;

        return $lastNumber;
    }

}
