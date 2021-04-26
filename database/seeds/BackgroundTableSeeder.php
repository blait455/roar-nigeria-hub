<?php

use App\Background;
use Illuminate\Database\Seeder;

class BackgroundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Background::created([
            'f1_bg' => 'default.png',
            'f2_bg' => 'default.png',
            'f3_bg' => 'default.png',
            'f4_bg' => 'default.png',
            'f5_bg' => 'default.png',
            'a1_bg' => 'default.png',
            'a2_bg' => 'default.png',
            'b1_bg' => 'default.png',
            'b2_bg' => 'default.png',
            'c_bg' => 'default.png',
            'e1_bg' => 'default.png',
            'e2_bg' => 'default.png',
            's1_bg' => 'default.png',
            's2_bg' => 'default.png',
        ]);
    }
}
