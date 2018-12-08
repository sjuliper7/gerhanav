<?php

namespace App\Http\Controllers;

use App\Product;
use App\RequestStore;
use App\Review;
use App\StatusStore;
use App\StatusTransaction;
use App\Store;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole("Admin")){
            $statusStore = StatusStore::where('name','PENDING')->firstOrFail();
            $users = User::all();
            $requestStores = RequestStore::where(["id_status" => $statusStore->id])->get();
            $transactions = Transaction::where([['id_status','!=' ,5], ['id_status','!=' ,6]])->get();
            return view('admin.home', compact('requestStores','users','transactions'));
        }else{
            return redirect("/");
        }
    }
}
