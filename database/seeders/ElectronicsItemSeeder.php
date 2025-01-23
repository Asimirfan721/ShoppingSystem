<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Electronics;

class ElectronicsItemSeeder extends Seeder
{
    public function run()
    {
        Electronics::create([
            'name' => 'Smartphone',
            'description' => 'Latest smartphone with amazing features.',
            'price' => 599.99,
            'image' => 'smartphone.jpg',
        ]);

        Electronics::create([
            'name' => 'Laptop',
            'description' => 'High-performance laptop for work and gaming.',
            'price' => 999.99,
            'image' => 'laptop.jpg',
        ]);

        Electronics::create([
            'name' => 'Headphones',
            'description' => 'Noise-cancelling headphones with excellent sound quality.',
            'price' => 150.50,
            'image' => 'headphones.jpg',
        ]);
    }
}
