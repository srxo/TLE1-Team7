<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->insert([
            ['name' => 'Item 1', 'description' => 'Description for Item 1'],
            ['name' => 'Item 2', 'description' => 'Description for Item 2'],
            ['name' => 'Item 3', 'description' => 'Description for Item 3'],
            // Add more items as needed
        ]);
    }
}
