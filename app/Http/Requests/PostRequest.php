<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // todos son autorizados, si no, hay que poner una lógica de autorización, si es falso devuelve 403 CETTE ACTION N'EST PAS AUTORISÉE.
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
            // 'user'=>'required',
            'title'=>'required|max:10',
            'content'=>'required|min:10',
            // 'status'=>'required',
            // 'parent'=>'required',
            // 'type'=>'required',
        ];
    }
}
