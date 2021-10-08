<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create(['name' => 'World']);
        Topic::create(['name' => 'U.S.']);
        Topic::create(['name' => 'Technology']);
        Topic::create(['name' => 'Design']);
        Topic::create(['name' => 'Culture']);
        Topic::create(['name' => 'Business']);
        Topic::create(['name' => 'Politics']);
        Topic::create(['name' => 'Opinion']);
        Topic::create(['name' => 'Science']);
        Topic::create(['name' => 'Health']);
        Topic::create(['name' => 'Style']);
        Topic::create(['name' => 'Travel']);
    }
}
