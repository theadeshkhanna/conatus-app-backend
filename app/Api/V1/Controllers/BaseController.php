<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\BaseRequest;

use Dingo\Api\Exception\ValidationHttpException;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller {
    use Helpers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validate(BaseRequest $request, array $rules, array $messages = [], array $customAttributes = []) {
        $validator = Validator::make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors());
        }
    }

}
