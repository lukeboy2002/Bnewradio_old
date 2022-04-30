<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);
    }
}
