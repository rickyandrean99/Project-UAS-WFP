<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'nama' => 'Laptop'
        ]);

        DB::table('kategoris')->insert([
            'nama' => 'Accessories'
        ]);

        DB::table('kategoris')->insert([
            'nama' => 'Spare Parts'
        ]);
    }
}
