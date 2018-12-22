<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\DetailTransaction;
use App\Product;
use App\StatusProduct;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerProductController extends Controller
{
    public function index($name){
        $store = Store::where(['store_name' => $name])->firstOrFail();
        $products = $store->products;

        return view('owner-product.index',compact('products'));
    }

    public function create(){
        $statusProducts = StatusProduct::all();
        $categoryProducts = CategoryProduct::all();
        return view('owner-product.create',compact('statusProducts','categoryProducts'));
    }

    public function store(Request $request){

        $rules = [
            'name'     => 'required|max:90|unique:products',
        ];

        $customMessages = [
            'required' => 'Anda harus mengisi field :attribute.',
            'unique' => 'Silahkan gunakan nama lain. Nama '.$request['name'].' ini telah digunakan.',
            'max' => 'Panjang karakter yang anda input melebihi yang seharusnnya',
        ];

        $this->validate($request, $rules, $customMessages);

        $store = Auth::user()->store;

        $product = new Product();
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->description = $request['description'];
        $product->story = $request['story'];
        $product->weight = $request['weight'];
        $product->id_status = $request['status-select'];
        $product->id_category = $request['category-select'];
        $product->id_store = $store->id;


        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }
        }

        $images = json_encode($data);
        $product->images = $images;

        $product->save();

        return redirect(url('/my-store'));
    }

    public function show($id){
        $product = Product::with('status','category')->findOrFail($id);
        $images = json_decode($product->images);
        return view ('owner-product.show', compact('product','images'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->weight = $request['weight'];
        $product->description = $request['description'];
        $product->story = $request['story'];
        $product->id_status = $request['status-select'];
        $product->id_category = $request['category-select'];

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move('images/', $name);
                $data[] = $name;
            }

            $images = json_encode($data);
            $product->images = $images;
        }

        $product->save();

        return redirect()->route('my-store',
            $product->id)->with('flash_message',
            'Product, '. $product->name.' updated');
    }

    public function edit($id)
    {
        $product = Product::with('status','category')->findOrFail($id);
        $images = json_decode($product->images);

        $statusProducts  = StatusProduct::all();
        $categoryProducts = CategoryProduct::all();
        return view ('owner-product.edit', compact('product','statusProducts','categoryProducts','images'));
    }

    public function  listTransaction($id)
    {
        $ownerStores = Auth::user()->store;
//        dd($ownerStores);
        $productTransactions = array();
        $detailTransactions =  DetailTransaction::all();



        foreach($detailTransactions as $detailTransaction){
            if ($detailTransaction->product->store->id == $ownerStores->id){
                array_push($productTransactions, $detailTransaction);
//                echo $detailTransaction->product->store->id;
//                echo $detailTransaction->product->name;
//                echo $detailTransaction->product->images;
//                echo $detailTransaction->quantity;
//                echo $detailTransaction->sub_total_price;
//                dd($detailTransaction->sub_total_price);
//                dd($detailTransaction);
            }
        }

        return view('owner-product.list_transaction')->with('detailTransactions',$detailTransactions);

        //dd($productTransactions);



    }

}
