<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Http\FormRequest;

class BaseRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [

        ];
    }

    public function messages() {
        return [

        ];
    }
}
