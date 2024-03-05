<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use GeneralTrait;
    
    public function login(Request $request){
        try{
            $rules = [
                'email' => 'required|email|exists:admins,email',
                'password' => 'required'
            ];
            $validator = Validator::make($request->all(),$rules);
    
            if($validator->fails()){
                $code = $this->returnCodeToInput($validator);
                return $this->validationError($code,$validator);
            }
            return $this->returnSuccess('done',201);
        }catch(\Exception $e){
            return $this->returnError($e->getMessage(),$e->getCode());
        }
    }


}
