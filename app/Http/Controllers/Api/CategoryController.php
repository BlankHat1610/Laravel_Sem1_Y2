<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $category = Category::all();
        $test = null;
        foreach ($category as $row) {
            $test = Product::join('categories', 'categories.id', '=', 'products.pro_category_id')
                ->where('products.pro_category_id', $row->id)
                ->get();
                $count = count($test);
                DB::table('categories')->where('categories.id', $row->id)->update(['c_total_product' => $count]);
        }
        $result = Category::select(
            'id',
            'c_name',
            'c_total_product'
        )->get();
        return response($result, 200);
    }

    public function getCategoryProduct($id) {
        $categoryProduct = Product::join('categories', 'categories.id', '=', 'products.pro_category_id')
        ->where('products.pro_category_id', $id)->get();
        return response($categoryProduct, 200);
    }
}
