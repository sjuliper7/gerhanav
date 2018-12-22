<?php

use Illuminate\Database\Seeder;

class StatusRefundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_refunds')->insert(
            [
                'status' => "Accepted",
            ]
        );

        DB::table('status_refunds')->insert(
            [
                'status' => "Rejected",
            ]
        );

        DB::table('status_refunds')->insert(
            [
                'status' => "Pending",
            ]
        );

        DB::table('status_refunds')->insert(
            [
                'status' => "Completed",
            ]
        );
    }
}
