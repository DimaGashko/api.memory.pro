<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveWordsResultRequest extends FormRequest
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
         'remember_time' => 'required|numeric',
         'grade' => 'required|numeric',
         'template' => 'required|string',
         'items' => 'required',
      ];
   }
}
