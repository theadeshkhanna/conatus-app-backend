<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\StudentCreateRequest;
use App\Api\V1\Transformers\StudentTransformer;
use App\Jobs\SendEmailJob;
use App\Services\Entities\StudentService;

class StudentController extends BaseController {
    protected $studentService;

    public function __construct() {
        $this->studentService = new StudentService();
    }

    public function createStudent(StudentCreateRequest $request) {
        $student = $this->studentService->create($request);
        $this->dispatch(new SendEmailJob($student));
        return $this->response->item($student, new StudentTransformer());
    }
}
