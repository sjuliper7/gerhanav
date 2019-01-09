<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Product;
use App\CategoryProduct;
use App\StatusProduct;
use App\DetailTransaction;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use PHPUnit\Util\Json;

class ProductController extends Controller
{
//    public function __construct() {
//        $this->middleware(['auth', 'isAdmin']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductCollection(Product::get());
//        $store = Auth::user()->store;
//        $productTransactions = array();
//        $detailTransactions =  DetailTransaction::all();
//
//        foreach($detailTransactions as $detailTransaction){
//            if ($detailTransaction->product->store->id == $store->id){
//                array_push($productTransactions, $detailTransaction);
//            }
//        }
//        $products = Product::where(['id_store' => $store->id])->orderby('id', 'desc')->get();
//        return response()->json(['products'=>$products,'detailTransactions'=>$detailTransactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statusProducts = StatusProduct::all();
        $categoryProducts = CategoryProduct::all();
        return response()->json(['statusProducts'=>$statusProducts,'categoryProducts'=>$categoryProducts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json();
//        $rules = [
//            'name'     => 'required|max:90|unique:products',
//        ];
//
//        $customMessages = [
//            'required' => 'Anda harus mengisi field :attribute.',
//            'unique' => 'Silahkan gunakan nama lain. Nama '.$request['name'].' ini telah digunakan.',
//            'max' => 'Panjang karakter yang anda input melebihi yang seharusnnya',
//        ];
//
//        $this->validate($request, $rules, $customMessages);
//
//        $store = Auth::user()->store;
//        $product = new Product();
//        $product->name = $request['name'];
//        $product->price = $request['price'];
//        $product->stock = $request['stock'];
//        $product->discount = $request['discount'];
//        $product->description = $request['description'];
//        $product->story = $request['story'];
//        $product->weight = $request['weight'];
//        $product->id_status = $request['status-select'];
//        $product->id_category = $request['category-select'];
//        $product->id_store = $store->id;
//
//
//        if($request->hasfile('images'))
//        {
//
//            foreach($request->file('images') as $image)
//            {
//                $name = $image->getClientOriginalName();
//                $image->move('images/', $name);
//                $data[] = $name;
//            }
//        }
//
//        $images = json_encode($data);
//        $product->images = $images;
//
//        $product->save();
//
//        //Display a successful message upon save
//
//        return response()->json(['message'=>'Product'. $product->name.' successfully create']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json();
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
//        $product->delete();

        return response()->json(['message'=>'Product successfully deleted']);
    }
}
