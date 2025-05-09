<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\InventoryItem;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch dynamic data for orders
        $orders = Order::select('id', 'item_name as name', 'quantity as amount', 'status')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Fetch dynamic data for inventory
        $inventory = InventoryItem::select('name', 'in_stock', 'minimum_threshold', 'status')
            ->orderBy('in_stock', 'asc')
            ->take(5)
            ->get();
            
        // Provide dummy data if no records are found
        if ($orders->isEmpty()) {
            $orders = $this->getDummyOrders();
        }
        
        if ($inventory->isEmpty()) {
            $inventory = $this->getDummyInventory();
        }

        return view('dashboard', compact('orders', 'inventory'));
    }
    
    /**
     * Get dummy order data when no real orders exist
     *
     * @return \Illuminate\Support\Collection
     */
    private function getDummyOrders()
    {
        return collect([
            (object)[
                'id' => 'ORD-1001',
                'name' => 'Veggie Bowl',
                'amount' => 2,
                'status' => 'Preparing'
            ],
            (object)[
                'id' => 'ORD-1002',
                'name' => 'Chicken Wrap',
                'amount' => 1,
                'status' => 'Ready'
            ],
            (object)[
                'id' => 'ORD-1003',
                'name' => 'Pasta Primavera',
                'amount' => 3,
                'status' => 'Pending'
            ],
            (object)[
                'id' => 'ORD-1004',
                'name' => 'Garden Salad',
                'amount' => 2,
                'status' => 'Ready'
            ],
            (object)[
                'id' => 'ORD-1005',
                'name' => 'Mushroom Risotto',
                'amount' => 1,
                'status' => 'Preparing'
            ],
        ]);
    }
    
    /**
     * Get dummy inventory data when no real inventory exists
     *
     * @return \Illuminate\Support\Collection
     */
    private function getDummyInventory()
    {
        return collect([
            (object)[
                'name' => 'Bell Peppers',
                'in_stock' => 12,
                'minimum_threshold' => 10,
                'status' => 'In Stock'
            ],
            (object)[
                'name' => 'Portobello Mushrooms',
                'in_stock' => 8,
                'minimum_threshold' => 15,
                'status' => 'Low Stock'
            ],
            (object)[
                'name' => 'Chicken Breast',
                'in_stock' => 25,
                'minimum_threshold' => 20,
                'status' => 'In Stock'
            ],
            (object)[
                'name' => 'Fresh Basil',
                'in_stock' => 5,
                'minimum_threshold' => 8,
                'status' => 'Low Stock'
            ],
            (object)[
                'name' => 'Arborio Rice',
                'in_stock' => 18,
                'minimum_threshold' => 15,
                'status' => 'In Stock'
            ],
        ]);
    }
}