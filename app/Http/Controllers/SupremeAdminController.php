<?php

namespace App\Http\Controllers;

use App\Services\SupremeAdminService;
use Illuminate\Http\Request;

class SupremeAdminController extends Controller
{
    public function index(){
        return view('pages.supremeAdmin');
    }

    public function getUserDetails(Request $request){
        $response = SupremeAdminService::getUserDetails($request);
        return response()->json($response);
    }
}
