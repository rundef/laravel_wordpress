<?php
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' 		=> 'McGill X-1 Demo Day 2015',
            'start_date' 	=> '2015-09-05',
            'end_date' 	=> '2015-09-05',
            'description' 	=> 'The McGill X-1 Accelerator is an intensive 10-week summer program to learn the skills to become better entrepreneurs from June 15 to September 9.'
        ]);
        Event::create([
            'name' 		=> '2015 Go Global Expo - Montreal',
            'start_date' 	=> '2015-09-26',
            'end_date' 	=> '2015-09-26',
            'description' 	=> 'The Go Global Expo (www.letsgoglobal.ca) is a FREE expo taking place September 26 at the Palais des Congrès in downtown Montreal. It features international opportunities for those who are considering a graduate or undergraduate degree abroad, an exchange, international work or internships, and volunteering abroad.'
        ]);
    }
}
