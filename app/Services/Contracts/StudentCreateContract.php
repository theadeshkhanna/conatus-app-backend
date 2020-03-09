<?php

namespace App\Services\Contracts;

interface  StudentCreateContract {
    public function getName();
    public function getStudentNumber();
    public function getRollNumber();
    public function getEmail();
    public function getPhoneNumber();
    public function getLanguage();
    public function getYear();
    public function getBranch();
}
