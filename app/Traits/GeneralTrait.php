<?php
namespace App\Traits;

trait GeneralTrait{

    public function get_current_lang(){
        return app()->getLocale();
    }

    public function returnError($error_num, $msg){
        return response()->json([
            'status' => false,
            'error_num' => $error_num,
            'msg' => $msg
        ]);
    }

    public function returnSuccessMessage($msg = "" , $error_num = "S000"){
        return response()->json([
            'status' => true,
            'error_num' => $error_num,
            'msg' => $msg
        ]);
    }

    public function returnData($key, $value, $msg = ""){
        return response()->json([
            'status' => true,
            // 'error_num' => "S000",
            'msg' => $msg,
            $key => $value,
        ]);
    }




}