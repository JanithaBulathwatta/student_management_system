<?php

namespace App\Services;
use App\Repository\interface\StudentServiceInterface;
use App\Repository\Interfaces\StudentServiceInterface as StuServiceInterface;

class StudentService{

    public static function setStudentCreation($request){
        $result = app()->make(StuServiceInterface::class)->setStudentCreation($request);
        return $result;
    }

    public static function getStudenDetails($request){
        $result = app()->make(StuServiceInterface::class)->getStudenDetails($request);
        return $result;
    }

    public static function setStudentRemove($request){
        $result = app()->make(StuServiceInterface::class)->setStudentRemove($request);
        return $result;
    }

    public static function setStudentUpdate($request){
        $result = app()->make(StuServiceInterface::class)->setStudentUpdate($request);
        return $result;
    }

}
