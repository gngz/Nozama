<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('categories')->insert([
            'name' => "Veículos",
        ]);

        DB::table('categories')->insert([
            'name' => "Lazer",
        ]);

        DB::table('categories')->insert([
            'name' => "Tecnologia",
        ]);

        DB::table('categories')->insert([
            'name' => "Imóveis",
        ]);
    }
}
