<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAdmin
{
    use \App\Traits\GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = null;
        try{
            $user = JWTAuth::parsetoken()->authenticate();
        }catch(\Exception $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->returnError('INVALID_TOKEN',400);

            }elseif($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->returnError('EXPIRED_TOKEN',403);
            }else{
                return $this->returnError('TOKEN_NOT_FOUND',404);
            }
        }catch(\Throwable $e){
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->returnError('INVALID_TOKEN',400);
            }elseif($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->returnError('EXPIRED_TOKEN',403);
            }else{
                return $this->returnError('TOKEN_NOT_FOUND',404);
            }
        }
        if(!$user)
            return $this->returnError('Unauthenticated',401);
        return $next($request);
    }
}
