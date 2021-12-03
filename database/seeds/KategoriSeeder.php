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
            'nama' => 'Laptop',
            'foto' => 'Laptop.png'
        ]);

        DB::table('kategoris')->insert([
            'nama' => 'Aksesoris',
            'foto' => 'Aksesoris.png'
        ]);

        DB::table('kategoris')->insert([
            'nama' => 'Spare Part',
            'foto' => 'Spare Part.png'
        ]);
    }
}
