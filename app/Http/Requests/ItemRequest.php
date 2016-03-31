<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request
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
           // 'serial' => 'required|min:2',
            'item_desc' => 'required|min:2',
            'category' => 'required|min:2',
            'quantity' => 'required|numeric',
            'condition' => 'required|min:2',
        ];
    }
}
