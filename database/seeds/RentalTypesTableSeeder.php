<?php

use Illuminate\Database\Seeder;

class RentalTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rental_types')->insert([
            'id' => 0,
            'name' => 'なし'
        ]);
        DB::table('rental_types')->insert([
            'id' => 1,
            'name' => 'フルレンタル'
        ]);
        DB::table('rental_types')->insert([
            'id' => 2,
            'name' => 'タオルレンタル'
        ]);
        DB::table('rental_types')->insert([
            'id' => 3,
            'name' => 'レンタル1点'
        ]);
    }
}
