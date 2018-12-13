<?php

namespace App\Http\Controllers;

use App\StatusRefund;
use Illuminate\Http\Request;

class StatusRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusRefunds = StatusRefund::all();
        return view('admin.status-refunds.index')->with('statusRefund', $statusRefunds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status-refunds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statusRefund = new StatusRefund();
        $statusRefund->status = $request['status'];

        $statusRefund->save();

        return redirect()->route('status-refund.index')
            ->with('flash_message', 'Status Refund,
             '. $statusRefund->status.' created');
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
        $statusRefund = StatusRefund::findOrFail($id);
        return view ('admin.status-refunds.edit', compact('statusRefund'));
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
        $statusRefund = StatusRefund::findOrFail($id);
        $statusRefund->status = $request['status'];

        $statusRefund->save();

        return redirect()->route('status-refund.index',
            $statusRefund->id)->with('flash_message',
            'Status, '. $statusRefund->status.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusRefund = StatusRefund::findOrFail($id);
        $statusRefund->delete();

        return redirect()->route('status-refund.index')
            ->with('flash_message',
                'Status Refund successfully deleted');
    }
}
