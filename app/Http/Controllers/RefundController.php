<?php

namespace App\Http\Controllers;

use App\Refund;
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
        $categoryProducts = CategoryProduct::all();
        return view('refund.request-refund', compact('categoryProducts'));
    }

    public function indexAdmin(){
        $refund = Refund::all();
        return view('admin.refunds.index', compact('refund'));
    }

    public function indexUser(){
        $categoryProducts = CategoryProduct::all();
        $user = Auth::user();
        $refunds = $user->refunds;
        return view('refund.index', compact('refunds', 'categoryProducts'));
    }

    public function detailRefund($id){
        $refund = Refund::find($id);
        return view('admin.refunds.show', compact('refund'));
    }

    public function rejectRefund($id){
        $refund = Refund::find($id);
        return view('admin.refunds.reject', compact('refund'));
    }

    public function acceptRefund($id){
        $refund = Refund::find($id);
        $refund->id_status_refund = 1;
        $refund->update();

        return redirect(url('/refund-admin/'));
    }

    public function createReject(Request $request, $id){
        $refund = Refund::find($id);
        $refund->id_status_refund = 2;
        $refund->alasan_penolakan = $request['alasan-penolakan'];
        $refund->update();
        return redirect(url('/refund-admin/'));
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
        $categoryProducts = CategoryProduct::all();
        $saveRefund = new Refund();
        $saveRefund->alasan = $request['alasan-select'];
        $saveRefund->keterangan = $request['keterangan'];

        $refundFile    = $request->file('refund-image');
        $refundFileName   = $refundFile->getClientOriginalName();
        $request->file('refund-image')->move('images/', $refundFileName);

        $saveRefund->refund_image = $refundFileName;

        $saveRefund->save();

        $refund = Refund::find($saveRefund->id);

        return view('refund.detail-refund', compact('categoryProducts','refund'));
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
