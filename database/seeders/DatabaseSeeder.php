<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryItem;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        InventoryItem::truncate();
        Order::truncate();

        // Seed Inventory Items
        $inventoryItems = [
            ['name' => 'Jam', 'in_stock' => 1, 'minimum_threshold' => 71, 'status' => 'Low Stock'],
            ['name' => 'Pepper', 'in_stock' => 1, 'minimum_threshold' => 39, 'status' => 'Low Stock'],
            ['name' => 'Olive Oil', 'in_stock' => 4, 'minimum_threshold' => 65, 'status' => 'Low Stock'],
            ['name' => 'Flour', 'in_stock' => 15, 'minimum_threshold' => 10, 'status' => 'In Stock'],
        ];

        foreach ($inventoryItems as $item) {
            InventoryItem::create($item);
        }

        // Seed Orders
        $orders = [
            ['item_name' => 'Stuffed Peppers', 'quantity' => 18, 'day_of_week' => 'Monday', 'status' => 'Ready'],
            ['item_name' => 'Stuffed Mushrooms', 'quantity' => 77, 'day_of_week' => 'Tuesday', 'status' => 'Pending'],
            ['item_name' => 'Beef Wellington', 'quantity' => 6, 'day_of_week' => 'Wednesday', 'status' => 'Ready'],
            ['item_name' => 'Chicken Alfredo', 'quantity' => 7, 'day_of_week' => 'Thursday', 'status' => 'Pending'],
            ['item_name' => 'Clam Chowder', 'quantity' => 7, 'day_of_week' => 'Friday', 'status' => 'Ready'],
        ];
        
        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}