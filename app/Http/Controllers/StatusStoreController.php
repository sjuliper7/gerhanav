<?php

namespace App\Http\Controllers;

use App\StatusStore;
use Illuminate\Http\Request;

class StatusStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusStores = StatusStore::orderby('id', 'desc')->get();
        return view('admin.status-stores.index', compact('statusStores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status-stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statusStore = new StatusStore();
        $statusStore->name = $request['name'];

        $statusStore->save();

        return redirect()->route('status-stores.index')
            ->with('flash_message', 'Status Store,
             '. $statusStore->name.' created');
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
        $statusStore = StatusStore::findOrFail($id);
        return view ('admin.status-stores.edit', compact('statusStore'));
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
        $statusStore = StatusStore::findOrFail($id);
        $statusStore->name = $request['name'];

        $statusStore->save();

        return redirect()->route('status-stores.index',
            $statusStore->id)->with('flash_message',
            'Status, '. $statusStore->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusStore = StatusStore::findOrFail($id);
        $statusStore->delete();

        return redirect()->route('status-stores.index')
            ->with('flash_message',
                'Status Product successfully deleted');
    }
}
