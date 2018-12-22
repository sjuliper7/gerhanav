<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use App\KonfirmasiRefund;
use App\Product;
use App\RequestRefund;
use Illuminate\Http\Request;
use App\CategoryProduct;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class RequestRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryProducts = CategoryProduct::all();
        $requestRefunds = RequestRefund::all();

        return view('request-refund.index', compact('categoryProducts', 'requestRefunds'));
    }

    public function indexAdmin(){
        $requestRefunds = RequestRefund::all();
        return view('admin.request-refunds.index', compact('requestRefunds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function storeRequest(Request $request, $id){
        $rules = [
            'bukti_barang_image'     => 'required | mimes:jpeg,jpg,png,JPG,JPEG,PNG | max:1000',
        ];

        $customMessages = [
            'required' => 'Bukti Barang Harus diisi. ',
            'mimes' => 'Bukti Barang harus format jpeg,jpg,png. ',
            'max' => 'Maksimal 1Mb. '
        ];

        $this->validate($request, $rules, $customMessages);

        $detailTransaction = DetailTransaction::find($id);

        $requestRefund = new RequestRefund();

        $file       = $request->file('bukti_barang_image');
        $fileName   = $file->getClientOriginalName();
        $request->file('bukti_barang_image')->move('images/',$fileName);

        $requestRefund->bukti_barang_image = $fileName;
        $requestRefund->id_user = Auth::user()->id;
        $requestRefund->id_product = $detailTransaction->product->id;
        $requestRefund->id_detail_transaction = $detailTransaction->id;
        $requestRefund->id_status_refund = '3';
        $requestRefund->alasan_pengembalian = $request["alasan-select"];
        $requestRefund->keterangan = $request["keterangan"];

        $requestRefund->save();

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
        $categoryProducts = CategoryProduct::all();
        $detailTransaction = DetailTransaction::find($id);
        return view('request-refund.request-refund', compact('categoryProducts' ,'detailTransaction'));
    }

    public function showAdmin($id){
        $requestRefund = RequestRefund::find($id);

        return view('admin.request-refunds.show', compact('requestRefund'));
    }

    public function showUser($id){
        $requestRefund = RequestRefund::find($id);
        $categoryProducts = CategoryProduct::all();

        return view('request-refund.detail-refund', compact('requestRefund', 'categoryProducts'));
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

    public function acceptRequest($id){
        $requestRefund = RequestRefund::find($id);
        $requestRefund->id_status_refund = '1';
        $requestRefund->update();

        return redirect('request-refund-admin');
    }

    public function rejectRequest($id){
        $requestRefund = RequestRefund::find($id);
        return view('admin.request-refunds.reject', compact('requestRefund'));
    }

    public function storeReject(Request $request, $id){
        $requestRefund = RequestRefund::find($id);
        $konfirmasiRefund = new KonfirmasiRefund();

        $requestRefund->id_status_refund = '2';

        $konfirmasiRefund->id_request_refund = $requestRefund->id;
        $konfirmasiRefund->no_hp_yang_dihubungi = $request["nomor"];
        $konfirmasiRefund->alasan_penolakan = $request["alasan-penolakan"];

        $konfirmasiRefund->save();
        $requestRefund->update();

        return redirect('request-refund-admin');
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
