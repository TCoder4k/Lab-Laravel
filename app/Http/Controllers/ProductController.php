<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller implements HasMiddleware
{   
    //
    public static function middleware(){
        return[
            CheckTimeAccess::class,
        ];
    }
    
    public function index(){
         $title = "Product List";
        return view("product.index", data: [
        "title" => $title,
        "products" => [
            ['id'=> 1, 'name'=> 'Product A', 'price' => 100],
            ['id'=> 2, 'name'=> 'Product B', 'price' => 200],
            ['id'=> 3, 'name'=> 'Product C', 'price' => 300]
        ]
        ]);
    }
    public function getDetail(string $id="123"){
        return view("product.detail", ["id" => $id]);
    }
   
    
    // public function postEdit(string $id){
    //     return view('product.edit', ['id' => $id]);
    // }
}
