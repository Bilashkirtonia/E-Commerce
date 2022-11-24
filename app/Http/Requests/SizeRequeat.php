<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequeat extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(isset($this->id)){
            return [
                'name'=> 'required|unique:sizes,name,'.$this->id
            ];
           }else{
            return [
                'name'=> 'required|unique:sizes'
            ];
           }
    }
}
