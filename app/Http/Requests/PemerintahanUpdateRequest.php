<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemerintahanUpdateRequest extends FormRequest
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
        return [
            'nama' => 'required',
            'image' => 'image|max:2048|mimes:png,jpg,jpeg',
            'jabatan' => 'required',
            'masuk' => 'required',
            'keluar' => 'required'
        ];
    }
}
