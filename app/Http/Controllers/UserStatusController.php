<?php

namespace App\Http\Controllers;

use App\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStatuss = UserStatus::orderby('id', 'desc')->get();
        return view('admin.user-status.index', compact('userStatuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $userStatus= new UserStatus();
        $userStatus->name = $request['name'];

        $userStatus->save();

        return redirect()->route('user-status.index')
            ->with('flash_message', 'Tipe User,
             '. $userStatus->name.' created');
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
        $userStatus= UserStatus::findOrFail($id);
        return view('admin.user-status.edit',compact('userStatus'));

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
        $userStatus = UserStatus::findOrFail($id);
        $userStatus->name = $request['name'];

        $userStatus->save();

        return redirect()->route('user-status.index',
            $userStatus->id)->with('flash_message',
            'Status, '. $userStatus->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userStatus = UserStatus::findOrFail($id);
        $userStatus ->delete();

        return redirect()->route('user-status.index')
            ->with('flash-message',
                    'UserStatus successfully deleted');
    }
}
