<?php

namespace App\Http\Controllers;

use App\StatusProduct;
use Illuminate\Http\Request;

class StatusProductController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $statusProducts = StatusProduct::orderby('id', 'desc')->get();

        return view('admin.status-products.index', compact('statusProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statusProduct = new StatusProduct();
        $statusProduct->name = $request['name'];

        $statusProduct->save();

        return redirect()->route('status-products.index')
            ->with('flash_message', 'Status Product,
             '. $statusProduct->name.' created');
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
        $statusProduct = StatusProduct::findOrFail($id);
        return view ('admin.status-products.edit', compact('statusProduct'));
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
        $statusProduct = StatusProduct::findOrFail($id);
        $statusProduct->name = $request['name'];

        $statusProduct->save();

        return redirect()->route('status-products.index',
            $statusProduct->id)->with('flash_message',
            'Status, '. $statusProduct->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusProduct = StatusProduct::findOrFail($id);
        $statusProduct->delete();

        return redirect()->route('status-products.index')
            ->with('flash_message',
                'Status Product successfully deleted');
    }
}
