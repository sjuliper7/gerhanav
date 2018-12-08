<?php

use Illuminate\Database\Seeder;

class StoreStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('status_stores')->insert(
            [
                'name' => "PENDING",
            ]
        );

        DB::table('status_stores')->insert(
            [
                'name' => "ACCEPTED",
            ]
        );

        DB::table('status_stores')->insert(
            [
                'name' => "REJECTED",
            ]
        );

    }
}
