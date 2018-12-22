<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $categoryProducts = CategoryProduct::all();
            $user=Auth::user();
            $profile = $user->userProfile;
            return view('admin.user-profile.index', compact('profile','user','categoryProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = Auth::user();
        return view('admin.user-profile.create',compact('userProfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userProfile= new UserProfile();
        $userProfile->profile_image=$request['profile_image'];
//        $request->file('image')->move('images/',$userProfile);

        $userProfile->full_name = $request['full_name'];
        $userProfile->date_of_birth= $request['date_of_birth'];
        $userProfile->address = $request['address'];
        $userProfile->id_user = Auth::user()->id;

        $userProfile->save();

        return redirect()->route('user-profile.create')
            ->with('flash_message', 'User Profile,
             '. $userProfile->name.' created');
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
        $categoryProducts = CategoryProduct::all();
        $profile = UserProfile::findOrFail($id);
        return view ('admin.user-profile.edit', compact('profile','categoryProducts'));

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
        $profile = UserProfile::findOrFail($id);
        $profile->full_name = $request['full_name'];
        $profile->address = $request['address'];
        $profile->date_of_birth= $request['date_of_birth'];


        $img= $request->file('profile_image');
        $filename = $img->getClientOriginalName();
        if($filename != $profile->profille_image){
            $request->file('profile_image')->move('images/',$filename);
            $profile->profile_image = $filename;
        }

        $profile->save();

        return redirect()->route('user-profile.index',
            $profile->id)->with('flash_message',
            'Article, '. $profile->name.' updated');
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
