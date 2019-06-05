<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormPrzedmiotyValidation extends FormRequest
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
            //Validacja do Przedmiotow
            'nazwa' =>'required|alpha',
            'godzin' =>'required|numeric|max:90|min:1'
        ];
    }

    public function messages()
    {
      return [
        'nazwa.required' => 'Pole nazwa jest wymagane',
        'nazwa.alpha' => 'Pole nazwa akceptuje tylko litery',
        'godzin.required' => 'Pole godzin jest wymagane',
        'godzin.numeric' => 'Pole godzin akceptuje tylko liczby',
        'godzin.min' => 'Pole godzin musi być wieksze od 0',
        'godzin.max' => 'Pole godzin musi być mniejsze od 90'
        ];
    }

}
