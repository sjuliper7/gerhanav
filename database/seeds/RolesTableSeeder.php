<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert(
            [
                'name' => "Admin",
                'guard_name' => "web",
            ]
        );

        DB::table('roles')->insert(
            [
                'name' => "Customer",
                'guard_name' => "web",
            ]
        );
    }
}
