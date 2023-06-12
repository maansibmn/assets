<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'asset_name' => 'required|max:255',
            'asset_description' => 'required',
            'asset_type' => 'required',
            'brand_name'  => 'required',
            'date_of_purchase' => 'date',
            'purchase_amount' => 'numeric',
            'dealer_name' => 'max:255',
            'invoice' => 'max:255'
        ];
    }
}
