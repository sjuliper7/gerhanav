<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;

class CategoryProductController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryProducts = CategoryProduct::orderby('id', 'desc')->get();

        return view('admin.category-products.index', compact('categoryProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryProduct = new CategoryProduct();
        $categoryProduct->name = $request['name'];

        $categoryProduct->save();

        return redirect()->route('category-products.index')
            ->with('flash_message', 'Category Product,
             '. $categoryProduct->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        return view ('admin.category-products.edit', compact('categoryProduct'));
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
        $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct->name = $request['name'];

        $categoryProduct->save();

        return redirect()->route('category-products.index',
            $categoryProduct->id)->with('flash_message',
            'Status, '. $categoryProduct->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct ->delete();

        return redirect()->route('category-products.index')
            ->with('flash_message',
                'Category Product successfully deleted');
    }
}
