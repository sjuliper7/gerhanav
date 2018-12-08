<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             RolesTableSeeder::class,
             PermissionsTableSeeder::class,
             StoreStatusTableSeeder::class,
             StatusProductTableSeeder::class,
             CategoryProductTableSeeder::class,
             RefBankTableSeeder::class,
             RequestStoreTableSeeder::class,
             StoresTableSeeder::class,
             StatusTransactionTableSeeder::class,
             ProductTableSeeder::class,
         ]);

    }
}
