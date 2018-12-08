<?php

namespace App\Http\Controllers;

use App\StatusTransaction;
use Illuminate\Http\Request;

class StatusTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusTransactions = StatusTransaction::orderby('id', 'desc')->get();

        return view('admin.status-transactions.index', compact('statusTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statusTransaction = new StatusTransaction();
        $statusTransaction->name = $request['name'];

        $statusTransaction->save();

        return redirect()->route('status-transactions.index')
            ->with('flash_message', 'Status Transactions,
             '. $statusTransaction->name.' created');
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
        $statusTransaction = StatusTransaction::findOrFail($id);
        return view ('admin.status-transactions.edit', compact('statusTransaction'));
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
        $statusTransaction = StatusTransaction::findOrFail($id);
        $statusTransaction->name = $request['name'];

        $statusTransaction->save();

        return redirect()->route('status-transactions.index',
            $statusTransaction->id)->with('flash_message',
            'Status Transaction, '. $statusTransaction->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusTransaction = StatusTransaction::findOrFail($id);
        $statusTransaction->delete();

        return redirect()->route('status-transactions.index')
            ->with('flash_message',
                'Status Transactions successfully deleted');
    }
}
