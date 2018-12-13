<?php

use Illuminate\Database\Seeder;

class StatusTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_transactions')->insert(
            [
                'name' => "Menunggu Pembayaran",
            ]
        );

        DB::table('status_transactions')->insert(
            [
                'name' => "Menunggu Verifikasi",
            ]
        );

        DB::table('status_transactions')->insert(
            [
                'name' => "Pembayaran Tervirifikasi",
            ]
        );

        DB::table('status_transactions')->insert(
            [
                'name' => "Order Disiapkan",
            ]
        );

        DB::table('status_transactions')->insert(
            [
                'name' => "Paket Dikirim",
            ]
        );

        DB::table('status_transactions')->insert(
            [
                'name' => "Paket Diterima",
            ]
        );

        DB::table('status_transactions')->insert(
            [
                'name' => "Transaksi Batal",
            ]
        );

    }
}
