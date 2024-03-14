<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

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
            $credentials = $request->only(['email','password']);
            $token = Auth::guard('admin-api')->attempt($credentials);
            if(!$token){
                $error_code = $this->get_error_code();
                return $this->returnError('there is no record', $error_code);
            }
            $admin = Auth::guard('admin-api')->user();
            $admin->token = $token;
            return $this->returnData('admin',$admin,'Authentication data is success');
        }catch(\Exception $e){
            return $this->returnError($e->getMessage(),$e->getCode());
        }
    }


}
