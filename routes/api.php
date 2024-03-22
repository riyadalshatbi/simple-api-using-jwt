<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\User\AuthUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['middleware'=>['api','check_Password','change_language'],'namespace'=>'Api'],function(){
    Route::post('get_main_categories',[CategoriesController::class,'index']);
    Route::post('get_category',[CategoriesController::class,'get_category']);
    Route::post('change_category_status',[CategoriesController::class,'change_category_status']);

    Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        Route::post('login',[AuthController::class,'login']);
        Route::post('logout',[AuthController::class,'logout'])->middleware(['guard_type:admin-api']);
    });

    Route::group(['namespace'=>'user','prefix'=>'user'],function(){
        Route::post('login',[AuthUserController::class,'login']);
    });

    Route::group(['middleware'=>'guard_type:user-api','prefix'=>'user'],function(){
        Route::post('profile',function(){
            return \Auth::user();
        });
    });
});
