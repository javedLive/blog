<?php

use Illuminate\Database\Seeder;
use App\Bear;
use App\Fish;
use App\Tree;
use App\Picnic;

class BearAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bears')->delete();
        DB::table('fish')->delete();
        DB::table('picnics')->delete();
        DB::table('trees')->delete();
        DB::table('bears_picnics')->delete();



        /* Bear Table Seeder*/

         // bear 1 is named Lawly. She is extremely dangerous. Especially when hungry.
        $bearLawly = Bear::create(array(
            'name'         => 'Lawly',
            'type'         => 'Grizzly',
            'danger_level' => 8
        ));

        // bear 2 is named Cerms. He has a loud growl but is pretty much harmless.
        $bearCerms = Bear::create(array(
            'name'         => 'Cerms',
            'type'         => 'Black',
            'danger_level' => 4
        ));

        // bear 3 is named Adobot. He is a polar bear. He drinks vodka.
        $bearAdobot = Bear::create(array(
            'name'         => 'Adobot',
            'type'         => 'Polar',
            'danger_level' => 3
        ));

        $this->command->info('The bears are alive!');

        /* Fish Table Seeder*/
         Fish::create(array(
            'weight'  => 5,
            'bear_id' => $bearLawly->id
        ));
        Fish::create(array(
            'weight'  => 12,
            'bear_id' => $bearCerms->id
        ));
        Fish::create(array(
            'weight'  => 4,
            'bear_id' => $bearAdobot->id
        ));
        
        $this->command->info('They are eating fish!');

        /* Tree Table Seeder */

        Tree::create(array(
            'type'    => 'Redwood',
            'age'     => 500,
            'bear_id' => $bearLawly->id
        ));
        Tree::create(array(
            'type'    => 'Oak',
            'age'     => 400,
            'bear_id' => $bearLawly->id
        ));

        $this->command->info('Climb bears! Be free!');

        /* Picnic Table Seeder*/

        // we will create one picnic and apply all bears to this one picnic
        $picnicYellowstone = Picnic::create(array(
            'name'        => 'Yellowstone',
            'taste_level' => 6
        ));
        $picnicGrandCanyon = Picnic::create(array(
            'name'        => 'Grand Canyon',
            'taste_level' => 5
        ));
        
        // link our bears to picnics ---------------------
        // for our purposes we'll just add all bears to both picnics for our many to many relationship
        $bearLawly->picnics()->attach($picnicYellowstone->id);
        $bearLawly->picnics()->attach($picnicGrandCanyon->id);

        $bearCerms->picnics()->attach($picnicYellowstone->id);
        $bearCerms->picnics()->attach($picnicGrandCanyon->id);

        $bearAdobot->picnics()->attach($picnicYellowstone->id);
        $bearAdobot->picnics()->attach($picnicGrandCanyon->id);

        $this->command->info('They are terrorizing picnics!');

    }
}
