<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
         'username' => ['required', 'string', 'unique:users'],
         'email' => ['required', 'unique:users'],
         'password' => ['required', 'string', 'min:6'],
         'first_name' => ['required'],
         'last_name' => ['required'],
         'birth' => ['required', 'date'],
      ];
   }
}
