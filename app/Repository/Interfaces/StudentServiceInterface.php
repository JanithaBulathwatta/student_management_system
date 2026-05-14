<?php

namespace App\Repository\Interfaces;

interface StudentServiceInterface{

    public function setStudentCreation($request);
    public function getStudenDetails($request);
    public function setStudentRemove($request);
    public function setStudentUpdate($request);

}

