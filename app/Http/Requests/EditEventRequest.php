<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditEventRequest extends Request
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
            'id' => 'required|integer|exists:events,id',
            'title' => 'required|max:100',
            'description' => 'required|max:10000'
        ];
    }
}
