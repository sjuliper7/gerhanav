<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\CategoryProduct;
use App\Product;
use App\StatusProduct;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryProduct::all();
        $products = Product::all();
        return view('admin.catalog-products.index',compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $images = json_decode($product->images);

        return view ('admin.catalog-products.show', compact('product','images'));
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
        $images = json_decode($product->images);

        $firstPrice= $product->price;
        $discount= $product->discount;
        $price_discount= $discount/100*$firstPrice;
        $lastPrice = $firstPrice - $price_discount;

        $statusProducts  = StatusProduct::all();
        $categoryProducts = CategoryProduct::all();
        return view ('admin.catalog-products.edit', compact('product','statusProducts','categoryProducts','images','lastPrice'));
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

        return redirect()->route('catalog-products.show',
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
        $catalog = Catalog::findOrFail($id);
        $catalog->is_active = 0;
        $catalog ->update();

        return redirect()->route('catalog-products.index')
            ->with('flash_message',
                'Catalog Product successfully deleted');
    }

    public function save($id){
        $id_product = $id;
        $catalog = new Catalog();
        $catalog->id_product = $id_product;
        $catalog->save();
        return redirect()->route('catalog-products.index');

    }

    public function list(){
    $catalog = Catalog::where(['is_active'=> 1])->get();
    $products = Product::all();
    $categories = CategoryProduct::all();
    return view('admin.catalog-products.list',compact('categories','products','catalog'));
    }

    public function discount(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->discount = $request['discount'];
        $product->save();
        return redirect()->route('catalog-products.show', $product->id);
    }
}
