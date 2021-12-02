<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'nama' => 'ASUS'
        ]);

        DB::table('brands')->insert([
            'nama' => 'Acer'
        ]);

        DB::table('brands')->insert([
            'nama' => 'MSI'
        ]);

        DB::table('brands')->insert([
            'nama' => 'Corsair'
        ]);
    }
}
