<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormOcenyValidation extends FormRequest
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
            //Validacja do Ocen
            'imie' =>'required|alpha',
            'nazwisko' =>'required|alpha',
            'przedmiot' =>'required|alpha',
            'ocena' =>'required|numeric|max:6|min:1'
        ];
    }
    /*

    public function messages()
    {
      return [
        'imie.required' => 'Pole imie jest wymagane',
        'imie.alpha' => 'Pole imie akceptuje tylko litery',
        'nazwisko.required' => 'Pole imie jest wymagane',
        'nazwisko.alpha' => 'Pole imie akceptuje tylko litery',
        'przedmiot.required' => 'Pole imie jest wymagane',
        'przedmiot.alpha' => 'Pole imie akceptuje tylko litery',
        'ocena.min' => 'Minimalna ocena to 1',
        'godzin.max' => 'Maksymalna ocena to 6'
        'ocena.required' => 'Pole ocena jest wymagane'
        'ocena.numeric' => 'Pole akceptuje tylo liczby'
        ];
    }
*/
}
