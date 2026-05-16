<?php

namespace App\Repository;
use App\Repository\Interfaces\SupremeAdminServiceInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupremeAdminServiceRepository implements SupremeAdminServiceInterface{

    public function getUserDetails($request){

        $resultSet = DB::table('users')
                        ->select('id','name','email','role')
                        ->where('record_status',1)
                        ->get();


        return[
            "status" =>200,
            "data"=>$resultSet
        ];
    }

    public function setUserDelete($request){
        $userId = $request->userid;

        $currentUser = Auth::id();

        if($currentUser == $userId){
            return[
                "status"=>401,
                "message"=>['this is you.you can not remove you from
                            the system. because you are the supreme admin']
            ];
        }

        try {
            DB::table('users')
            ->where('id',$userId)
            ->update([
                'record_status'=>0
            ]);

            return[
                "status" => 200,
                "message" => ['user deleted succesfuly']
            ];

        } catch (Exception $e) {

            return[
                "status"=>400,
                "message"=>[$e->getMessage()]
            ];
        }

    }

}
