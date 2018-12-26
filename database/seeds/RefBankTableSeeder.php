<?php

use Illuminate\Database\Seeder;

class RefBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('ref_banks')->insert(
            [
                'account_vendor' => "BRI",
                'account_number' => "530601021725535",
            ]
        );

        DB::table('ref_banks')->insert(
            [
                'account_vendor' => "BNI",
                'account_number' => "0387218257",
            ]
        );

        DB::table('ref_banks')->insert(
            [
                'account_vendor' => "MANDIRI",
                'account_number' => "1070007647326",
            ]
        );
    }
}
