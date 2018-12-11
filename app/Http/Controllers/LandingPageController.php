<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\CategoryProduct;
use App\Product;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index(){
        $categoryProducts = CategoryProduct::all();
        $products = Product::all();

//        $firstPrice= $products->price;
//        dd($products);
//        $discount= $products->discount;
//        $price_discount= $discount/100*$firstPrice;
//        $lastPrice = $firstPrice - $price_discount;


        $catalog = Catalog::with('product')->get();
        $productsView = Product::where('viewed', '!=' , 0)->get();

        $mostProductView = array();

        for($i = 0; $i<count($productsView) ; $i++){
            for ($j = 0; $j < count($productsView) - $i -1 ;$j++ ){
                if($productsView[$i]->viewed < $productsView[$j+1]->viewed){
                    $temp = $productsView[$j];
                    $productsView[$j] = $productsView[$j+1];
                    $productsView[$j+1] = $temp;
                }
            }
        }

        $max = 6;

        if(count($productsView ) < 6){
            $max = count($productsView);
        }

        for($i=0; $i<$max;$i++){
            array_push($mostProductView, $productsView[$i]);
        }

        return view('landing-page',compact('categoryProducts', 'products','mostProductView','catalog','lastPrice'));
    }

    public function buyProduct($name){
        $categoryProducts = CategoryProduct::all();
        $product = Product::where(['name' => $name])->firstOrFail();
        $product->viewed = $product->viewed + 1;
        $images = json_decode($product->images);
        $reviews = $product->reviews()->paginate(30);
        $product->save();
        $desc = "";
        $story = "";

        if(strlen($product->description) < 50 ){
            for($i = 0 ;$i<strlen($product->description);$i++){
                $desc .= $product->description[$i];
            }
        }else{
            for($i = 0 ;$i<50;$i++){
                $desc .= $product->description[$i];
            }
        }

        if(strlen($product->story) < 50 ){
            for($i = 0 ;$i<strlen($product->story);$i++){
                $story .= $product->story[$i];
            }
        }else{
            for($i = 0 ;$i<50;$i++){
                $story .= $product->story[$i];
            }
        }

        $desc .= "... ";
        $story .= "... ";

        return view('detail-product',compact('product','images','reviews','desc','story','categoryProducts'));
    }


    public function searchByName($name){
        $categoryProducts = CategoryProduct::all();
        $store = Store::where(['store_name' => $name])->firstOrFail();
        $products = $store->products;

        return view('store',compact('products','store','categoryProducts'));
    }

    public function searchByCategory($category){
        $categoryProducts = CategoryProduct::all();

        $category_ = CategoryProduct::where(['name' => $category])->firstOrFail();
        $products = Product::where(['id_category'=> $category_->id])->get();

        return view('category-product',compact('products','category','categoryProducts'));
    }

    public function getUser(){
        return Auth::user()->id;
    }
}
