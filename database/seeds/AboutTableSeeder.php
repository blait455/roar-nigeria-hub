<?php

use App\About;
use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'image' => 'default.png',
            'content' => 'This iss just about roar nigeria hub',
            'image1_3' => 'default.png',
            'image2_3' => 'default.png',
            'image3_3' => 'default.png',
        ]);
    }
}
