<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    private $rajaOngkir;
    public function __construct() {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
        $this->rajaOngkir = new RajaOngkirController();
    }

    public function index(){
        $categoryProducts = CategoryProduct::all();
        $carts = Cart::where(['id_user' => Auth::user()->id, 'is_active' => true])->get();
        $provinces = $this->rajaOngkir->getProvinces();

        if(!Auth::guest() && count($carts) > 0){
            $total = 0;
            foreach ($carts as $cart){
                $total += $cart->sub_total_price;
            }
            return view('transaction.checkout-detail',compact('carts','total', 'provinces','categoryProducts'));
        }else{
            return redirect('/login')->with('message','Anda Harus Login!');
        }
    }
}
