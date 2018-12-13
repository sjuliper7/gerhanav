<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\DetailTransaction;
use App\Product;
use App\StatusProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Auth::user()->store;
        $productTransactions = array();
        $detailTransactions =  DetailTransaction::all();

        foreach($detailTransactions as $detailTransaction){
            if ($detailTransaction->product->store->id == $store->id){
                array_push($productTransactions, $detailTransaction);
            }
        }
        $products = Product::where(['id_store' => $store->id])->orderby('id', 'desc')->get();
        return view('admin.products.index', compact('products','detailTransactions'));
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
        return view('admin.products.create', compact('statusProducts','categoryProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $product->discount = $request['discount'];
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

        //Display a successful message upon save

        return redirect()->route('products.index')
            ->with('flash_message', 'Product,
             '. $product->name.' created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('status','category')->findOrFail($id);
//        dd($product);
        $firstPrice= $product->price;
        $discount= $product->discount;
        $price_discount= $discount/100*$firstPrice;
        $lastPrice = $firstPrice - $price_discount;
//        dd($lastPrice);
//        $product->lastPrice = $lastPrice;
//        $product->price = $lastPrice;
        $images = json_decode($product->images);

        return view ('admin.products.show', compact('product','images','lastPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('status','category')->findOrFail($id);
//        dd($product);
        $images = json_decode($product->images);

        $firstPrice= $product->price;
        $discount= $product->discount;
        $price_discount= $discount/100*$firstPrice;
        $lastPrice = $firstPrice - $price_discount;

        $statusProducts  = StatusProduct::all();
        $categoryProducts = CategoryProduct::all();
        return view ('admin.products.edit', compact('product','statusProducts','categoryProducts','images','lastPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->weight = $request['weight'];
        $product->discount = $request['discount'];
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

        return redirect()->route('products.show',
            $product->id)->with('flash_message',
            'Product, '. $product->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('flash_message',
                'Product successfully deleted');
    }
}
