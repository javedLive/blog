<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();

        // call our class and run our seeds
        $this->call(BearAppSeeder::class);
      //  $this->command->info('Bear app seeds finished.');
    }
}
