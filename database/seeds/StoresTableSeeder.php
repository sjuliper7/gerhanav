<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert(
            [
                'store_name' => 'Batak Zone Merchant',
                'store_owner' => "Batak Zone",
                'store_email' => "admin@batakzone.com",
                'store_phone' => "0812321345111",
                'store_address' => "Institut Teknologi Del",
                'store_ktp' => "-",
                'store_ktp_image' => "-",
                'store_npwp' => "-",
                'store_npwp_image' => "-",
                'store_account_bank' => "987654567898765431",
                'store_account_type' => "Mandiri",
                'store_account_bank_image' => "-",
                'store_province'=>"Sumutera Utara",
                'store_districts'=>"Kabupaten Tobasamosir",
                'store_sub_district'=>"Balige",
                'id_request' => '1',
                'id_user' => '1',
            ]
        );


//        DB::table('stores')->insert(
//            [
//                'store_name' => 'Johan Toko Kita',
//                'store_owner' => "Johan Amanada",
//                'store_email' => "johan-toko-kita@gmail.com",
//                'store_phone' => "0812321345111",
//                'store_address' => "Jalan Sie Rampah",
//                'store_ktp' => "098765432121",
//                'store_ktp_image' => "ktp.jpg",
//                'store_npwp' => "2245y56543235432",
//                'store_npwp_image' => "npwp.jpeg",
//                'store_account_bank' => "987654567898765431",
//                'store_account_type' => "Mandiri",
//                'store_account_bank_image' => "account.jpeg",
//                'store_province'=>"",
//                'store_districts'=>"",
//                'store_sub_district'=>"",
//                'id_request' => '2',
//                'id_user' => '2',
//            ]
//        );
    }
}
