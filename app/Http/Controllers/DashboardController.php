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

        return view('dashboard', compact('orders', 'inventory'));
    }
}