<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\RequestStore;
use App\StatusStore;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $rajaOngkir;

    public function __construct() {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
        $this->rajaOngkir = new RajaOngkirController();
    }

    public function index()
    {
        $stores = RequestStore::orderby('id', 'desc')->get();

        return view('admin.store-requests.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryProducts = CategoryProduct::all();
        $provinces = $this->rajaOngkir->getProvinces();

        return view('stores.request-store',compact('provinces','categoryProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = StatusStore::where('name','PENDING')->firstOrFail();

        //instance object for StatusStore
        $requestStore = new RequestStore();
        $requestStore->store_name         = $request['store-name'];
        $requestStore->store_owner        = $request['store-owner'];
        $requestStore->store_email        = $request['store-email'];
        $requestStore->store_phone        = $request['store-phone'];
        $requestStore->store_address      = $request['store-address'];
        $requestStore->store_ktp          = $request['store-ktp'];
        $requestStore->store_npwp         = $request['store-npwp'];
        $requestStore->store_account_bank = $request['store-account-number'];
        $requestStore->store_account_type = $request['type-bank'];
        $requestStore->store_province     = $request['province-select'];
        $requestStore->store_districts    = $request['city-select'];
        $requestStore->store_sub_district = $request['sub-district-select'];
        $requestStore->id_status          = $status->id;
        $requestStore->id_user            = Auth::user()->id;

        $ktpFile    = $request->file('ktp-image');
        $ktpFileName   = $ktpFile->getClientOriginalName();
        $request->file('ktp-image')->move('images/',$ktpFileName);

        $npwpFile    = $request->file('npwp-image');
        $npwpFileName   = $npwpFile->getClientOriginalName();
        $request->file('npwp-image')->move('images/',$npwpFileName);

        $accountFile    = $request->file('account-image');
        $accountFileName   = $accountFile->getClientOriginalName();
        $request->file('account-image')->move('images/',$accountFileName);

        $requestStore->store_ktp_image             = $ktpFileName;
        $requestStore->store_npwp_image            = $npwpFileName;
        $requestStore->store_account_bank_image    = $accountFileName;
        $requestStore->comment                     = "-";

        $requestStore->save();

        return redirect('my-store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requestStore = RequestStore::findOrFail($id);
        return view("admin.store-requests.show",compact('requestStore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $status = StatusStore::where('name','ACCEPTED')->firstOrFail();
        $requestStore = RequestStore::findOrFail($id);
        $requestStore->id_status = $status->id;

        $store = new Store();
        $store->store_name = $requestStore['store_name'];
        $store->store_owner = $requestStore['store_owner'];
        $store->store_email= $requestStore['store_email'];
        $store->store_phone = $requestStore['store_phone'];
        $store->store_address = $requestStore['store_address'];
        $store->store_ktp = $requestStore['store_ktp'];
        $store->store_ktp_image = $requestStore['store_ktp_image'];
        $store->store_npwp = $requestStore['store_npwp'];
        $store->store_npwp_image = $requestStore['store_npwp_image'];
        $store->store_account_bank= $requestStore['store_account_bank'];
        $store->store_account_type = $requestStore['store_account_type'];
        $store->store_account_bank_image = $requestStore['store_account_bank_image'];
        $store->store_province = $requestStore['store_province'];
        $store->store_districts = $requestStore['store_districts'];
        $store->store_sub_district = $requestStore['store_sub_district'];
        $store->id_request = $requestStore['id'];
        $store->id_user = $requestStore['id_user'];

        $store->save();
        $requestStore->save();

        return redirect()->route('request-stores.index')->with('flash_message',
            'Store, '. $store->store_name.' has been Accepted');

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


    public function cancelRequest(Request $request){

        $status = StatusStore::where('name','REJECTED')->firstOrFail();
        $requestStore = RequestStore::findOrFail($request->requestID);

        $requestStore->id_status = $status->id;
        $requestStore->comment = $request->comment;

        $requestStore->update();

        return "/request-stores";
    }
}
