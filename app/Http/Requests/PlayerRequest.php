<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'skill_level' => 'required|integer|between:0,100',
            'gender' => 'required|integer|between:0,1',
            'velocity' => 'required|integer',
            'strength' => 'required|integer',
            'reaction' => 'required|integer'
        ];
    }
}
