<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
use Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthUserController extends Controller
{
    use GeneralTrait;
    
    public function login(Request $request){
        try{
            $rules = [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ];
            $validator = Validator::make($request->all(),$rules);
    
            if($validator->fails()){
                $code = $this->returnCodeToInput($validator);
                return $this->validationError($code,$validator);
            }
            $credentials = $request->only(['email','password']);
            $auth_token = Auth::guard('user-api')->attempt($credentials);
            if(!$auth_token){
                $error_code = $this->get_error_code();
                return $this->returnError('there is no record', $error_code);
            }
            $user = Auth::guard('user-api')->user();
            $user->auth_token = $auth_token;
            return $this->returnData('user',$user,'Authentication data is success');
        }catch(\Exception $e){
            return $this->returnError($e->getMessage(),$e->getCode());
        }
    }
}
