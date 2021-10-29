<?php

namespace App\Http\Requests;

use App\models\BeerType;
use Illuminate\Foundation\Http\FormRequest;

class BeerTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
                BeerType::NAME => [
                    'max:255',
                    function ($attribute, $value, $fail) {
                        if ($value === null){
                            $fail('Ошибка с башкой, офай комп');
                        }

                }]
        ];
    }
    public function messages()
    {
        return [
            BeerType::NAME . '.min' => 'Ошибка, офай комп'
        ];
    }
    public function attributes()
    {
        return [
            BeerType::NAME => 'Название'

            ];
    }
}
