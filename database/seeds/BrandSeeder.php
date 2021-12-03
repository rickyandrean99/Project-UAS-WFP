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
            'nama' => 'ASUS',
            'foto' => 'ASUS.png'
        ]);

        DB::table('brands')->insert([
            'nama' => 'Acer',
            'foto' => 'Acer.png'
        ]);

        DB::table('brands')->insert([
            'nama' => 'MSI',
            'foto' => 'MSI.png'
        ]);

        DB::table('brands')->insert([
            'nama' => 'Corsair',
            'foto' => 'Corsair.png'
        ]);
    }
}
