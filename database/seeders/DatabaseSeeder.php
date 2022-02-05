<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    
        User::create([
            'name' => 'andri',
            'username' => 'andri',
            'email' => 'andri@mail.com',
            'password' => bcrypt('andri'),

        ]);

        User::factory(5)->create();


        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Category::create([
            'name' => 'Web Desain',
            'slug' => 'web-desain',
        ]);

       post::factory(15)->create();
    }
}



 

        // User::create([
        //     'name' => 'adit',
        //     'email' => 'adit@gmail.com',
        //     'password' => bcrypt('12345'),

        // ]);