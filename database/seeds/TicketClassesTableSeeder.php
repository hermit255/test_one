<?php

use Illuminate\Database\Seeder;

class TicketClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defineName = \App\Models\TicketClass::class;
        factory($defineName, 20)->create();
    }

}
