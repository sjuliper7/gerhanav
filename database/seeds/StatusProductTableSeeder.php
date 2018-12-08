<?php

use Illuminate\Database\Seeder;

class StatusProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('status_products')->insert(
            [
                'name' => "BARU",
            ]
        );

        DB::table('status_products')->insert(
            [
                'name' => "BEKAS",
            ]
        );
    }
}
