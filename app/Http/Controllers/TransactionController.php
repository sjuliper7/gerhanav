<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\DetailTransaction;
use App\RefBank;
use App\Product;
use App\StatusTransaction;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index()
    {
        $categoryProducts = CategoryProduct::all();
        $user = Auth::user();
        $transactions = $user->transactions;
        return view('transaction.index', compact('transactions','categoryProducts'));
    }

    public function payment($order_id)
    {
        $categoryProducts = CategoryProduct::all();
        $transaction = Transaction::where(['order_id' => $order_id])->firstOrFail();
        $refBanks = RefBank::all();
        return view('transaction.confirm-payment',compact('transaction', 'refBanks','categoryProducts'));
    }

    public function updatePayment(Request $request, $id){
        $rules = [
            'provement'     => 'required | mimes:jpeg,jpg,png | max:1000',
        ];

        $customMessages = [
            'required' => 'Bukti Pembayaran harus disi Harus diisi. ',
            'mimes' => 'Bukti Pembayaran harus format jpeg,jpg,png. ',
            'max' => 'Maksimal 1Mb. '
        ];

        $this->validate($request, $rules, $customMessages);

        $transaction =Transaction::find($id);

        $status = StatusTransaction::where(['name' => "Menunggu Verifikasi"])->firstOrFail();

        $file       = $request->file('provement');
        $fileName   = $file->getClientOriginalName();
        $request->file('provement')->move('images/',$fileName);

        $transaction->prove_payment = $fileName;
        $transaction->id_status = $status->id;

        $transaction->save();

        return redirect("transactions");
    }

    public function confirmPayment(Request $request)
    {
        $carts = Auth::user()->carts;
        $statusTransactions = StatusTransaction::where(['name' => "Menunggu Pembayaran"])->firstOrFail();

        $transaction = new Transaction();
        $transaction->total_price = $request["total"];
        $transaction->shipment_fee = $request["shipment_fee"];
        $transaction->shipment_etd = $request["shipment_etd"];
        $transaction->prove_payment = "-";
        $transaction->address = $request["address"];
        $transaction->id_user = Auth::user()->id;
        $transaction->id_status = $statusTransactions->id;
        $transaction->order_id = str_pad(count(Transaction::all())   + 1, 8, "0", STR_PAD_LEFT);
        $transaction->save();

        foreach ($carts as $cart) {
            $detailTransaksi = new DetailTransaction();
            $detailTransaksi->quantity = $cart->quantity;
            $detailTransaksi->comment = $cart->comment;
            $detailTransaksi->sub_total_price = $cart->sub_total_price;
            $detailTransaksi->id_transaction = $transaction->id;
            $detailTransaksi->id_product = $cart->id_product;
            $detailTransaksi->id_cart = $cart->id;
            $detailTransaksi->save();
            $cart->is_active = false;
            $cart->save();
        }

        return redirect(url('/upload-payment/'.$transaction->order_id));
    }

    public function show($id)
    {
        $categoryProducts = CategoryProduct::all();
        $transaction = Transaction::find($id);
        $detailTransactions = $transaction->detailTransactions;
        return view('transaction.show', compact('detailTransactions', 'categoryProducts'));
    }

    public function indexAdmin()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index')->with('transactions', $transactions);
    }

    public function detailTransaction($id)
    {
        $transaction = Transaction::find($id);
        $detailTransactions = $transaction->detailTransactions;
        $status = StatusTransaction::all();

        return view('admin.transaction.show', compact('detailTransactions','status'));
    }

    public function statusTransaction(Request $request,$id){
        $transaction = Transaction::findOrFail($id);
        if($request['shipment_number'] == null){
            $transaction->id_status = $request['status'];
        }else{
            $transaction->id_status = $request['status'];
            $transaction->shipment_number = $request['shipment_number'];
        }

        $transaction->save();

        return redirect(url('transactions-admin/'.$transaction->id));
    }
}
