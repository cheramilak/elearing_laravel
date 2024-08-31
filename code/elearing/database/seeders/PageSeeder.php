<?php

namespace Database\Seeders;

use App\Models\ConfigModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConfigModel::create([
            'slug' => 'about-us',
            'value' => '<h1>About Us</h1><p>This is the about us page.</p>',
        ]);

        ConfigModel::create([
            'slug' => 'contact-us',
            'value' => '<h1>Contact Us</h1><p>This is the contact us page.</p>',
        ]);
    }
}
