<?php
namespace App\Traits;

trait GeneralTrait{

    public function get_current_lang(){
        return app()->getLocale();
    }

    public function returnError($msg, $status_code = 404){
        return response()->json([
            'success' => false,
            'status' => $status_code,
            'msg' => $msg
        ]);
    }

    public function returnSuccess($msg = "", $status_code = 201){
        return response()->json([
            'success' => true,
            'status' => $status_code,
            'msg' => $msg
        ]);
    }

    public function returnData($key, $value, $msg = ""){
        return response()->json([
            'success' => true,
            'msg' => $msg,
            $key => $value,
        ]);
    }

    public function returnCodeToInput($validator){
        $fields = array_keys($validator->errors()->toArray());
        $code = $this->get_error_code($fields[0]);
        return $code;
    }

    public function validationError($code = 400, $validator){
        return $this->returnError($validator->errors()->first(),$code);
    }

    protected function get_error_code($fields = 404){
        switch ($fields) {
            case 'email':
                return 'E.400';
                break;
            case 'password':
                return 'P.400';
                break;
            case 'name':
                return 'N.400';
                break;
            case 'mobile':
                return 'M.400';
                break;
            
            default:
                return '404';
                break;
        }
    }




}