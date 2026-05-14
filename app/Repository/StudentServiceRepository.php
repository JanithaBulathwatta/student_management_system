<?php

namespace App\Repository;

use App\Repository\Interfaces\StudentServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentServiceRepository implements StudentServiceInterface{

    public function setStudentCreation($request){

        $stuId = $request->stuId;
        $grade = $request->grade;
        $name = $request->name;
        $stream = $request->stream;

        DB::table('students')->insert([
            'stu_id'=>$stuId,
            'name'=>$name,
            'grade'=>$grade,
            'stream'=>$stream,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        return[
            "status"=>200,
            "message"=>["student created succesfully"]
        ];

    }

    public function getStudenDetails($request){


        try {
            $sql = "select stu.stu_id,
                       stu.name,
                       stu.grade,
                       stu.stream
                       from students stu
                       where stu.record_status = 1";

        $dataset = DB::select($sql);

        return[
            "status"=>200,
            "resultData"=>$dataset
        ];

        } catch (Exception $e) {
            return[
                "status"=>400,
                "message"=>[$e->getMessage()]
            ];
        }
    }

    public function setStudentRemove($request){

        $stuid = $request->stuID;
        DB::table('students')
            ->where('stu_id',$stuid)
            ->update([
                'record_status'=>0,
                'updated_at'=>Carbon::now()
            ]);
    }

    public function setStudentUpdate($request){
        $new_id = $request->newid;
        $new_name = $request->newName;
        $new_grade = $request->newGrade;
        $new_stream = $request->newStream;

        $old_id = $request->oldid;
        $old_name = $request->oldname;
        $old_grade = $request->oldgrade;
        $old_stream = $request->oldstream;

        if($new_id===$old_id && $new_name === $old_name && $new_grade === $old_grade && $new_stream === $old_stream){
            return[
                "status"=>400,
                "message"=>["At least one criteia shold be update"]
            ];
        }

        $isIdAvailble = DB::table('students')
                                ->where('stu_id',$new_id)
                                ->where('record_status',1)
                                ->where('stu_id','!=',$old_id)
                                ->exists();
        if($isIdAvailble){
                return[
                    "status"=>400,
                    "message"=>["student already created"]
                ];
        }

        DB::table('students')
            ->where('stu_id',$old_id)
            ->where('record_status',1)
            ->update([
                'stu_id'=>$new_id,
                'name'=>$new_name,
                'grade'=>$new_grade,
                'stream'=>$new_stream,
                'updated_at'=>Carbon::now()
            ]);

        return[
            "status"=>200,
            "message"=>["student succesfully updated"]
        ];
    }

}
