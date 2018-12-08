<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_products')->insert(
            [
                'name' => "Pakaian",
            ]
        );

        DB::table('category_products')->insert(
            [
                'name' => "Cenderamata",
            ]
        );

        DB::table('category_products')->insert(
            [
                'name' => "Ukiran",
            ]
        );

        DB::table('category_products')->insert(
            [
                'name' => "Buku",
            ]
        );

        DB::table('category_products')->insert(
            [
                'name' => "Properti",
            ]
        );

    }
}
