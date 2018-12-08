<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::orderby('id', 'desc')->get();

        return view('admin.user-types.index', compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.user-types.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userType = new UserType();
        $userType->name = $request['name'];

        $userType->save();

        return redirect()->route('user-types.index')
            ->with('flash_message', 'User Type,
             '. $userType->name.' created');
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
        $userType = UserType::findOrFail($id);
        return view ('admin.user-types.edit', compact('userType'));
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
        $UserType = UserType::findOrFail($id);
        $UserType->name = $request['name'];

        $UserType->save();

        return redirect()->route('user-types.index',
            $UserType->id)->with('flash_message',
            'Status, '. $UserType->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userType = UserType::findOrFail($id);
        $userType ->delete();

        return redirect()->route('user-types.index')
                ->with('flash-message',
                    'User Type successfully deleted');

    }

}
