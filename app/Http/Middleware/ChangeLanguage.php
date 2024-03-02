<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = 'ar'; // As a default language
        if(isset($request->lang) and !empty($request->lang)){
            $lang = $request->lang;
            if($this->is_available_lang($lang)){
                $lang = $lang;
            }else{
                return response()->json(['error'=> $lang . ' language is not available now']);
            }
        }
        app()->setLocale($lang);
        return $next($request);
    }

    public function is_available_lang($lang = null){
        switch ($lang) {
            case 'ar':
                return true;
                break;
            case 'en':
                return true;
                break;            
            default:
            return false;
                break;
        }
    }
}
