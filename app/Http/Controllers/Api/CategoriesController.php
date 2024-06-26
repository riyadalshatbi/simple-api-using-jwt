<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Category;
use App\Traits\GeneralTrait;

class CategoriesController extends Controller
{
    use GeneralTrait;

    public function index(Request $request){
        $category_name = 'name_'.app()->getLocale();
        $categories = Category::select(['id',$category_name.' as name','active','created_at'])->get();
        return $this->returnData('categories',$categories,'success');
    }

    public function get_category(Request $request){
        if(isset($request->id) and !empty($request->id)){
            $id = $request->id;
            $categories = Category::find($id);
            if(!$categories)
                return $this->returnError('this record is not found',404);
            return $this->returnData('category',$categories,'success');
        }
        return $this->returnError('not found',404);
    }
    public function change_category_status(Request $request){
        if(isset($request->id) and !empty($request->id)){
            $id = $request->id;
            $categories = Category::where('id',$id)->update(['active' => $request->active]);
            if(!$categories)
                return $this->returnError('this record is not found',404);
            return $this->returnSuccess('category status is changed successfully',201);
        }
    }
}
