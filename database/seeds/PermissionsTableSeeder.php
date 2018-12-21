<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('permissions')->insert(
            [
                'name' => "Administer Roles",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Permissions",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Products",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Product Category",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Product Status",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Product Catalog",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Refund Status",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('permissions')->insert(
            [
                'name' => "Administer Bank Reference",
                'guard_name' => "web",
                'created_at' => Carbon::now(),
            ]
        );

        DB::table('model_has_roles')->insert(
            [
                'role_id' => 1,
                'model_type' => "App\User",
                'model_id' => 1,
            ]
        );

//        DB::table('model_has_roles')->insert(
//            [
//                'role_id' => 2,
//                'model_type' => "App\User",
//                'model_id' => 2,
//            ]
//        );
//
//        DB::table('model_has_roles')->insert(
//            [
//                'role_id' => 2,
//                'model_type' => "App\User",
//                'model_id' => 3,
//            ]
//        );

        DB::table('role_has_permissions')->insert(
            [
                'permission_id' => 1,
                'role_id' => 1,
            ]
        );
//
//        DB::table('role_has_permissions')->insert(
//            [
//                'permission_id' => 2,
//                'role_id' => 2,
//            ]
//        );
//
//        DB::table('role_has_permissions')->insert(
//            [
//                'permission_id' => 3,
//                'role_id' => 2,
//            ]
//        );

    }
}
