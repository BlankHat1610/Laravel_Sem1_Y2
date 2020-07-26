<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        // lấy dữ liệu để chuyển thành json file
        $products = Product::select(
            'products.id',
            'products.pro_name',
            'products.pro_avatar',
            'products.pro_price',
            'categories.c_name'
        )
            ->join('categories', 'products.pro_category_id', '=', 'categories.id')
            ->get();
        return response($products, 200);
    }

    public function getNewProducts()
    {
        // logic to get new products goes here
        $newProducts = Product::select(
            'products.id',
            'products.pro_name',
            'products.pro_avatar',
            'products.pro_price',
            'categories.c_name'
        )->join('categories', 'products.pro_category_id', '=', 'categories.id')
        ->where('products.pro_new', 1)
            ->get();
        return response($newProducts, 200);

    }

    public function getSuggestionProducts()
    {
        // logic to get suggestion products goes here
        $suggestionProducts = Product::select(
            'products.id',
            'products.pro_name',
            'products.pro_avatar',
            'products.pro_price',
            'categories.c_name'
        )->join('categories', 'products.pro_category_id', '=', 'categories.id')
        ->where('products.pro_suggestion', 1)
            ->get();
        return response($suggestionProducts, 200);
    }

    public function getHotProducts()
    {
        // logic to get hot products goes here
        $hotProducts = Product::select(
            'products.id',
            'products.pro_name',
            'products.pro_avatar',
            'products.pro_price',
            'categories.c_name'
        )->join('categories', 'products.pro_category_id', '=', 'categories.id')
        ->where('products.pro_hot', 1)
            ->get();
        return response($hotProducts, 200);
    }

    public function getDetailProduct($id)
    {
        // logic to get a product info goes here
        $product = Product::select(
            'products.id',
            'products.pro_name',
            'products.pro_avatar',
            'products.pro_price',
            'products.pro_description',
            'products.pro_content',
            'categories.c_name',
        )->join('categories', 'products.pro_category_id', '=', 'categories.id')
        ->where('products.id', $id)
        ->get();
        return response($product, 200);
    }

    public function createProduct(Request $request)
    {
        // logic to create a product info goes here
    }

    public function updateProduct(Request $request, $id)
    {
        // logic to update a product info goes here
    }

    public function deleteProduct($id)
    {
        // logic to delete a student record goes here
    }

    public function searchProduct(Request $request) {
        $product = Product::where('pro_name', 'LIKE', '%'.request('q').'%')->get();
        return response($product, 200);
    }
}
