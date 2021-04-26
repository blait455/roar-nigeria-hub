<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BackgroundTableSeeder::class);
        $this->call(AboutTableSeeder::class);
        $this->call(AspectTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
