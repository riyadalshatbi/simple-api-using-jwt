<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $timestamps = true;
    protected $filleble = ['name_ar','name_en','active','created_at','updated_at'];
}
