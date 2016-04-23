<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            DB::table('events')->insert([
                'title' => str_random(4),
                'start'=>\Carbon\Carbon::now()->addDays(rand(1,7)),
                'end' => \Carbon\Carbon::now(),
                'allDay' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
