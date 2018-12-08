<?php

namespace App\Http\Controllers;

use App\RefBank;
use Illuminate\Http\Request;

class RefBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refBanks = RefBank::orderBy('id', 'desc')->get();
        return view('admin.ref-banks.index', compact('refBanks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ref-banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $refBanks = new RefBank();
        $refBanks->account_vendor = $request['account_vendor'];
        $refBanks->account_number = $request['account_number'];

        $refBanks->save();

        return redirect()->route('ref-banks.index')
            ->with('flash_message', 'Bank Ref,
                   '. $refBanks->accout_vendor.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $refBanks = RefBank::findOrFail($id);
        return view ('admin.ref-banks.edit', compact('refBanks'));
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
        $refBanks = RefBank::findOrFail($id);
        $refBanks->account_vendor = $request['account_vendor'];
        $refBanks->account_number = $request['account_number'];

        $refBanks->save();

        return redirect()->route('ref-banks.index')
            ->with('flash_message', 'Bank Ref,
             '. $refBanks->accout_vendor.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refBanks = RefBank::findOrFail($id);
        $refBanks ->delete();

        return redirect()->route('ref-banks.index')
            ->with('flash_message',
                'Ref Bank successfully deleted');
    }

    /*
     * $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct ->delete();

        return redirect()->route('category-products.index')
            ->with('flash_message',
                'Category Product successfully deleted');
     */
}
