<?php

use App\Aspect;
use Illuminate\Database\Seeder;

class AspectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspect::create(['title' => 'Information & Communication tech', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Medical & Health Science', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Biotech/Biomedical', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Idustrial electronics', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Environmental tech & waste management', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Food/Agro Innovations', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Home autoation and services', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Drone tech', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'e-commerce and fintech', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Blockchain tech', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'Artificial Intelligence', 'description' => 'this is just a description']);
        Aspect::create(['title' => 'IOT', 'description' => 'this is just a description']);
    }
}
