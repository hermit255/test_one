<?php

use Illuminate\Database\Seeder;

class PublishedTicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defineName = \App\Models\PublishedTicket::class;
        factory($defineName, 20)->create();
    }
}
