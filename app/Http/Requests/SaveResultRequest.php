<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveResultRequest extends FormRequest
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
            'start_at' => 'required|date',
            'preparation_time' => 'required|numeric',
            'recall_preparation_time' => 'required|numeric',
            'recall_time' => 'required|numeric',
            'template' => 'required|string',
            'items' => 'required',
            'items.*.time' => 'required|numeric|min:0',
            'items.*.data' => 'required',
            'items.*.data.*.correct' => 'required|numeric',
            'items.*.data.*.actual' => 'required',
        ];
    }
}
