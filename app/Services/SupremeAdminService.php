<?php

namespace App\Services;

use App\Repository\Interfaces\SupremeAdminServiceInterface;

class SupremeAdminService {

    public static function getUserDetails($request){
        $result = app()->make(SupremeAdminServiceInterface::class)->getUserDetails($request);
        return $result;
    }

    public static function setUserDelete($request){
        $result = app()->make(SupremeAdminServiceInterface::class)->setUserDelete($request);
        return $result;
    }

}
