<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Roar Nigeria Hub',
            'slogan' => 'Where technology lives',
            'email' => 'info@roarnigeriahub.com',
            'logo' => 'default.png',
            'fav' => 'default.png',
            'phone' => '0152152145',
            'address' => 'Beside CEC, UNN',
            'footer' => 'Roar Nieria Hub',
            'about' => 'This is just about us',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'instagram' => 'https://instagram.com'
        ]);
    }
}
