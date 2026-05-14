<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function setStudentCreation(Request $request){
        $response = StudentService::setStudentCreation($request);
        return response()->json($response);
    }

    public function getStudenDetails(Request $request){
        $response = StudentService::getStudenDetails($request);
        return response()->json($response);
    }

    public function setStudentRemove(Request $request){
        $response = StudentService::setStudentRemove($request);
        return response()->json($response);
    }

    public function setStudentUpdate(Request $request){
        
        $response = StudentService::setStudentUpdate($request);
        return response()->json($response);
    }

}
