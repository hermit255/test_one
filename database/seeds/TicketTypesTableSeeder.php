<?php

use Illuminate\Database\Seeder;

class TicketTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $defineName = \App\Models\TicketType::class;
        factory($defineName, 10)->create();
    }
}
