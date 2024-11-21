<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Drinks', 'parent_id' => null],
            ['id' => 2, 'name' => 'Food', 'parent_id' => null],
            ['id' => 3, 'name' => 'Dessert', 'parent_id' => null],
            ['id' => 4, 'name' => 'Specials', 'parent_id' => null],
            ['id' => 5, 'name' => 'Hot', 'parent_id' => 1],
            ['id' => 6, 'name' => 'Cold', 'parent_id' => 1],
            ['id' => 7, 'name' => 'Soft', 'parent_id' => 1],
            ['id' => 8, 'name' => 'Tea', 'parent_id' => 1],
            ['id' => 9, 'name' => 'Alcohol', 'parent_id' => 1],
            ['id' => 10, 'name' => 'Burgers', 'parent_id' => 2],
            ['id' => 11, 'name' => 'Pizza', 'parent_id' => 2],
            ['id' => 12, 'name' => 'Pasta', 'parent_id' => 2],
            ['id' => 13, 'name' => 'Vegan', 'parent_id' => 2],
            ['id' => 14, 'name' => 'Specialty', 'parent_id' => 2],
            ['id' => 15, 'name' => 'Cake', 'parent_id' => 3],
            ['id' => 16, 'name' => 'Ice Cream', 'parent_id' => 3],
            ['id' => 17, 'name' => 'Pancake', 'parent_id' => 3],
        ]);

        DB::table('items')->insert([
            ['name' => 'Latte', 'description' => 'Hot coffee drink', 'price' => 3.50, 'category_id' => 5, 'is_special' => false],
            ['name' => 'Iced Coffee', 'description' => 'Cold coffee drink', 'price' => 4.00, 'category_id' => 6, 'is_special' => false],
            ['name' => 'Coke', 'description' => 'Refreshing soft drink', 'price' => 1.50, 'category_id' => 7, 'is_special' => false],
            ['name' => 'Green Tea', 'description' => 'Soothing hot tea', 'price' => 2.00, 'category_id' => 8, 'is_special' => false],
            ['name' => 'Beer', 'description' => 'Chilled alcoholic drink', 'price' => 3.00, 'category_id' => 9, 'is_special' => false],
            ['name' => 'Cheeseburger', 'description' => 'Juicy beef burger', 'price' => 5.00, 'category_id' => 10, 'is_special' => false],
            ['name' => 'Pepperoni Pizza', 'description' => 'Classic pizza with pepperoni', 'price' => 7.50, 'category_id' => 11, 'is_special' => false],
            ['name' => 'Spaghetti Carbonara', 'description' => 'Pasta with creamy carbonara sauce', 'price' => 8.00, 'category_id' => 12, 'is_special' => false],
            ['name' => 'Vegan Burger', 'description' => 'Plant-based patty', 'price' => 6.00, 'category_id' => 13, 'is_special' => false],
            ['name' => 'Chef\'s Specialty Dish', 'description' => 'Signature specialty of the house', 'price' => 12.00, 'category_id' => 14, 'is_special' => true],
            ['name' => 'Chocolate Cake', 'description' => 'Rich chocolate cake', 'price' => 4.00, 'category_id' => 15, 'is_special' => false],
            ['name' => 'Vanilla Ice Cream', 'description' => 'Creamy vanilla ice cream', 'price' => 2.50, 'category_id' => 16, 'is_special' => false],
            ['name' => 'Pancakes', 'description' => 'Fluffy pancakes with syrup', 'price' => 3.00, 'category_id' => 17, 'is_special' => false],
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
