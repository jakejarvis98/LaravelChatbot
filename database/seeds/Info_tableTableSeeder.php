<?php

use Illuminate\Database\Seeder;

class Info_tableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Info::class, 5)->create();
    }
}
