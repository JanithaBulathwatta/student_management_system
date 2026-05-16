<?php

namespace App\Repository;
use App\Repository\Interfaces\SupremeAdminServiceInterface;
use Illuminate\Support\Facades\DB;

class SupremeAdminServiceRepository implements SupremeAdminServiceInterface{

    public function getUserDetails($request){

        $resultSet = DB::table('users')
                        ->select('name','email','role')
                        ->get();


        return[
            "status" =>200,
            "data"=>$resultSet
        ];
    }

}
