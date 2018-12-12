<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\RequestStore;
use App\StatusStore;
use App\Store;
use App\DetailTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function myStore(){
        $categoryProducts = CategoryProduct::all();
        if(count(Auth::user()->requestStore) == 0){
            return redirect('request-stores/create');
        }else{
            $request = Auth::user()->requestStore;

            if($request[count($request)-1]->status->name === "PENDING"){return view('stores.pending', compact('categoryProducts'));
            }
            elseif($request[count($request)-1]->status->name === "REJECTED"){
                $requestStore = $request[count($request)-1];
                return view('stores.rejected', compact('categoryProducts','requestStore'));
            }else{
                if($request[count($request)-1]->status->name === "REJECTED"){
                    $requestStore = $request[count($request)-1];
                    return view('stores.rejected',compact('requestStore', 'categoryProducts'));
                }else{
                    $store = Auth::user()->store;
                    $products = $store->products;
                    $categoryProducts = CategoryProduct::all();
                    $ownerStores = Auth::user()->store;
                    $productTransactions = array();
                    $detailTransactions =  DetailTransaction::all();

                    foreach($detailTransactions as $detailTransaction){
                        if ($detailTransaction->product->store->id == $ownerStores->id){array_push($productTransactions, $detailTransaction);
                        }
                    }

                    return view('owner-product.index',compact('products','store', 'detailTransactions','categoryProducts'));
                }
            }

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
