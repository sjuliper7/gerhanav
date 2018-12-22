<?php

namespace App\Http\Controllers;

use App\Refund;
use App\RequestRefund;
use Illuminate\Http\Request;
use App\CategoryProduct;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refunds = Refund::all();

        return view('admin.refunds.index', compact('refunds'));
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
        //
    }

    public function storeRefund(Request $request, $id){
        $requestRefund = RequestRefund::find($id);

        $refund = new Refund();

        $refund->id_product = $requestRefund->product->id;
        $refund->id_user = $requestRefund->id_user;
        $refund->id_detail_transaction = $requestRefund->detailTransaction->id;
        $refund->id_request_refund = $requestRefund->id;
        $refund->no_rekening_tujuan = $request["no-rek"];
        $refund->atas_nama = $request["name"];
        $refund->jenis_bank = $request["bank"];
        $refund->kurir_pengiriman = $request["kurir-select"];

        $refund->save();

        return redirect(url('/detail-request-refund/'.$requestRefund->id));

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

    public function updateRefund($id){
        $requestRefund = RequestRefund::find($id);
        $requestRefund->id_status_refund = '4';
        $requestRefund->update();

        return redirect('refund');
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
