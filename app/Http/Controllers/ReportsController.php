<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\InventoryItem;
use Carbon\Carbon;

class ReportsController extends Controller
{
    /**
     * Display the reports dashboard.
     */
    public function index()
    {
        // In a real application, you'd fetch actual data
        // For now, we'll simulate some dashboard metrics
        
        $reports = [
            'total_reports' => 428,
            'recent_reports' => 23,
            'favorite_reports' => 12,
            'shared_reports' => 8,
        ];

        $recentReports = [
            [
                'name' => 'Monthly Sales Performance',
                'type' => 'Sales',
                'created_at' => now()->subDays(2),
                'thumbnail' => 'graph-bar',
            ],
            [
                'name' => 'Inventory Stock Analysis',
                'type' => 'Inventory',
                'created_at' => now()->subDays(3),
                'thumbnail' => 'box',
            ],
            [
                'name' => 'Customer Retention Rate',
                'type' => 'Customers',
                'created_at' => now()->subDays(5),
                'thumbnail' => 'users',
            ],
            [
                'name' => 'Popular Items Trend',
                'type' => 'Products',
                'created_at' => now()->subDays(7),
                'thumbnail' => 'trending-up',
            ],
        ];
        
        return view('reports.index', compact('reports', 'recentReports'));
    }
    
    /**
     * Display the sales reports.
     */
    public function sales(Request $request)
    {
        // Get time period from request (default to 30 days)
        $period = $request->input('period', '30');
        
        // Mock sales data
        $salesData = $this->generateSalesData($period);
        $salesMetrics = $this->getSalesMetrics($salesData);

        // Add this to create regional data
    $regionalData = [
        ['name' => 'Northern Region', 'revenue' => 12456.78, 'growth' => 5.2],
        ['name' => 'Southern Region', 'revenue' => 8765.43, 'growth' => -2.1],
        ['name' => 'Eastern Region', 'revenue' => 6543.21, 'growth' => 3.7],
        ['name' => 'Western Region', 'revenue' => 9876.54, 'growth' => 1.5],
    ];

      // Also need to create $regionalMapData for the map
      $regionalMapData = [
        'US' => 15000.00,
        'CA' => 8500.00,
        'MX' => 4200.00,
        'UK' => 9800.00,
        'FR' => 7300.00,
        'DE' => 6700.00,
    ];

    // Add revenue breakdown data for the pie chart
    $revenueBreakdown = [
        ['category' => 'Main Course', 'value' => 12500.75],
        ['category' => 'Appetizers', 'value' => 8320.50],
        ['category' => 'Desserts', 'value' => 6410.25],
        ['category' => 'Beverages', 'value' => 9150.80],
        ['category' => 'Sides', 'value' => 3280.40]
    ];
    
    // Add regional data for the map and metrics
    $regionalData = [
        ['name' => 'Northern Region', 'revenue' => 12456.78, 'growth' => 5.2],
        ['name' => 'Southern Region', 'revenue' => 8765.43, 'growth' => -2.1],
        ['name' => 'Eastern Region', 'revenue' => 6543.21, 'growth' => 3.7],
        ['name' => 'Western Region', 'revenue' => 9876.54, 'growth' => 1.5],
    ];
    
    // Add regional map data
    $regionalMapData = [
        'US' => 15000.00,
        'CA' => 8500.00,
        'MX' => 4200.00,
        'UK' => 9800.00,
        'FR' => 7300.00,
        'DE' => 6700.00,
    ];
        
        return view('reports.sales', compact('salesData', 'salesMetrics', 'period','regionalData','revenueBreakdown', 'regionalMapData'));
    }
    
    /**
     * Display the inventory reports.
     */
    public function inventory(Request $request)
    {
        // Get time period from request (default to 30 days)
        $period = $request->input('period', '30');
        
        // Mock inventory data
        $inventoryData = $this->generateInventoryData($period);
        $inventoryMetrics = $this->getInventoryMetrics($inventoryData);
        
        return view('reports.inventory', compact('inventoryData', 'inventoryMetrics', 'period'));
    }
    
    /**
     * Display the customer reports.
     */
    public function customers(Request $request)
    {
        // Get time period from request (default to 30 days)
        $period = $request->input('period', '30');
        $currentCustomers = 120;
        $previousCustomers = 100; 
        $totalCustomers = 120;
        $newCustomers = 120;
        $newCustomers = 120;

        $growth = $previousCustomers > 0
        ? (($totalCustomers - $previousCustomers) / $previousCustomers) * 100
        : 0;

        $avgLifetimeValue = 2450.75;
        $retentionRate = 83.3;
        $topCustomers = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'orders' => 12,
                'total_spent' => 1200.00,
                 'last_order' => '2025-05-01'
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'orders' => 9,
                'total_spent' => 870.50,
                 'last_order' => '2025-05-01'
            ],
            [
                'name' => 'Carla Mendes',
                'email' => 'carla@example.com',
                'orders' => 7,
                'total_spent' => 660.25,
                 'last_order' => '2025-05-01'
            ],
        ];
        $recentActivities = [
            [
                'type' => 'purchase',
                'description' => 'John Doe purchased “Wireless Mouse”',
                'timestamp' => '2025-05-06 10:25:00',
                'time' => '10:25 AM',
            ],
            [
                'type' => 'signup',
                'description' => 'Jane Smith created an account',
                'timestamp' => '2025-05-06 09:10:00',
                'time' => '10:25 AM',
            ],
            [
                'type' => 'review',
                'description' => 'Emily Wu reviewed “Bluetooth Keyboard”',
                'timestamp' => '2025-05-05 14:45:00',
                'time' => '10:25 AM',
            ],
        ];

        $recentReviews = [
            [
                'name' => 'John Smith',
                'rating' => 5,
                'comment' => 'Excellent service and food quality! Will definitely come back.',
                'date' => '2025-05-06'
            ],
            [
                'name' => 'Sarah Johnson',
                'rating' => 4,
                'comment' => 'Great experience overall, though the wait time was a bit long.',
                'date' => '2025-05-05'
            ],
            [
                'name' => 'Michael Brown',
                'rating' => 3,
                'comment' => 'Food was good but the portion size was smaller than expected.',
                'date' => '2025-05-04'
            ],
            [
                'name' => 'Emily Davis',
                'rating' => 5,
                'comment' => 'Absolutely loved everything! The staff was very attentive.',
                'date' => '2025-05-03'
            ],
        ];
        $customerSegments = [
            'segment_new' => 42,       // New customers
            'segment_occasional' => 28, // Occasional buyers
            'segment_regular' => 15,   // Regular customers
            'segment_loyal' => 10,      // Loyal customers
            'segment_vip' => 5          // VIP customers
        ];
    
    
        
        
        // Mock customer data
        $customerData = $this->generateCustomerData($period);
        $customerMetrics = [
            'total_customers' => $totalCustomers,     
            'current' => $currentCustomers,
            'previous' => $previousCustomers,
            'growth_percentage' => $growth,
            'new_customers' => $newCustomers,
            'avg_lifetime_value' => $avgLifetimeValue,  
            'retention_rate' => $retentionRate,
            'top_customers' => $topCustomers,
            'recent_activities' => $recentActivities,
            'satisfaction_score' => 4.5,
            'recent_reviews' => $recentReviews, 
        ];

        $customerMetrics = array_merge($customerMetrics, $customerSegments);
    
        return view('reports.customers', compact('customerData', 'customerMetrics', 'period'));
        
    }
    
    
    /**
     * Generate mock sales data.
     */
    private function generateSalesData($period)
    {
        $days = (int)$period;
        $data = [];
        
        // Generate daily sales data
        for ($i = $days; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            
            $data[] = [
                'date' => $date,
                'revenue' => rand(10000, 50000) / 100,
                'orders' => rand(5, 30),
                'average_order' => rand(5000, 20000) / 100,
            ];
        }
        
        return $data;
    }
    
    /**
     * Get sales metrics.
     */
    private function getSalesMetrics($salesData)
    {
        // Calculate totals
        $totalRevenue = array_sum(array_column($salesData, 'revenue'));
        $totalOrders = array_sum(array_column($salesData, 'orders'));
        $avgOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;
        
        // Calculate growth
        $firstWeekRevenue = 0;
        $lastWeekRevenue = 0;
        $count = count($salesData);
        
        for ($i = 0; $i < min(7, $count); $i++) {
            $firstWeekRevenue += $salesData[$i]['revenue'];
        }
        
        for ($i = max(0, $count - 7); $i < $count; $i++) {
            $lastWeekRevenue += $salesData[$i]['revenue'];
        }
        
        $revenueGrowth = $firstWeekRevenue > 0 
            ? (($lastWeekRevenue - $firstWeekRevenue) / $firstWeekRevenue) * 100 
            : 0;
        
        // Get top selling items
        $topItems = [
            ['name' => 'Stuffed Peppers', 'count' => 18, 'percentage' => 85],
            ['name' => 'Stuffed Mushrooms', 'count' => 17, 'percentage' => 75],
            ['name' => 'Beef Wellington', 'count' => 12, 'percentage' => 60],
            ['name' => 'Chicken Alfredo', 'count' => 10, 'percentage' => 50],
            ['name' => 'Clam Chowder', 'count' => 8, 'percentage' => 40],
        ];
        
        return [
            'total_revenue' => $totalRevenue,
            'total_orders' => $totalOrders,
            'avg_order_value' => $avgOrderValue,
            'revenue_growth' => $revenueGrowth,
            'top_items' => $topItems,
        ];
    }
    
    /**
     * Generate mock inventory data.
     */
    private function generateInventoryData($period)
    {
        $days = (int)$period;
        $data = [];
        
        // Generate daily inventory data
        for ($i = $days; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            
            $data[] = [
                'date' => $date,
                'in_stock' => rand(100, 200),
                'low_stock' => rand(10, 30),
                'out_of_stock' => rand(0, 10),
            ];
        }
        
        return $data;
    }
    
    /**
     * Get inventory metrics.
     */
    private function getInventoryMetrics($inventoryData)
    {
        // Latest data
        $latest = end($inventoryData);
        
        // Calculate totals
        $totalItems = $latest['in_stock'] + $latest['low_stock'] + $latest['out_of_stock'];
        $stockPercentage = $totalItems > 0 ? ($latest['in_stock'] / $totalItems) * 100 : 0;
        
        // Low stock items
        $lowStockItems = [
            ['name' => 'Jam', 'current' => 1, 'threshold' => 71],
            ['name' => 'Pepper', 'current' => 1, 'threshold' => 39],
            ['name' => 'Olive Oil', 'current' => 4, 'threshold' => 65],
            ['name' => 'Flour', 'current' => 3, 'threshold' => 50],
            ['name' => 'Sugar', 'current' => 2, 'threshold' => 45],
        ];
        
        // Inventory turnover rate
        $turnoverRate = rand(30, 60) / 10; // 3.0 - 6.0
        
        return [
            'in_stock' => $latest['in_stock'],
            'low_stock' => $latest['low_stock'],
            'out_of_stock' => $latest['out_of_stock'],
            'total_items' => $totalItems,
            'stock_percentage' => $stockPercentage,
            'low_stock_items' => $lowStockItems,
            'turnover_rate' => $turnoverRate,
        ];
    }
    
    /**
     * Generate mock customer data.
     */
    private function generateCustomerData($period)
    {
        $days = (int)$period;
        $data = [];
        
        // Initial values
        $customers = 100;
        $growth = 1;
        
        // Generate daily customer data
        for ($i = $days; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            
            // Add some variation with a slight upward trend
            $newCustomers = rand(0, 5);
            $activeCustomers = min($customers, rand(10, $customers));
            $customers += $newCustomers;
            
            $data[] = [
                'date' => $date,
                'total_customers' => $customers,
                'new_customers' => $newCustomers,
                'active_customers' => $activeCustomers,
            ];
        }
        
        return $data;
    }
    
    /**
     * Get customer metrics.
     */
    private function getCustomerMetrics($customerData)
    {
        // Latest data
        $latest = end($customerData);
        
        // Calculate averages
        $totalNewCustomers = array_sum(array_column($customerData, 'new_customers'));
        $avgDailyNew = count($customerData) > 0 ? $totalNewCustomers / count($customerData) : 0;
        
        // Calculate active rate
        $activeRate = $latest['total_customers'] > 0 
            ? ($latest['active_customers'] / $latest['total_customers']) * 100 
            : 0;
        
        // Top customers
        $topCustomers = [
            ['name' => 'John Smith', 'orders' => 12, 'total_spent' => 1249.99],
            ['name' => 'Sarah Johnson', 'orders' => 8, 'total_spent' => 876.50],
            ['name' => 'Michael Brown', 'orders' => 6, 'total_spent' => 745.20],
            ['name' => 'Emily Davis', 'orders' => 5, 'total_spent' => 520.75],
            ['name' => 'David Wilson', 'orders' => 4, 'total_spent' => 489.99],
        ];
        
        return [
            'total_customers' => $latest['total_customers'],
            'active_customers' => $latest['active_customers'],
            'new_customers_period' => $totalNewCustomers,
            'avg_daily_new' => $avgDailyNew,
            'active_rate' => $activeRate,
            'top_customers' => $topCustomers,
        ];
    }

    /**
 * Display the product analytics reports.
 */
public function products(Request $request)
{
    // Get time period from request (default to 30 days)
    $period = $request->input('period', '30');
    
    // Mock data for product metrics
    $totalProducts = 142;
    $previousPeriodProducts = 132;
    $newProducts = 10;
    $avgRating = 4.3;
    $conversionRate = 6.8;
    
    // Calculate growth percentage
    $growthPercentage = $previousPeriodProducts > 0 
        ? (($totalProducts - $previousPeriodProducts) / $previousPeriodProducts) * 100 
        : 0;
    
    // Top performing products
    $topProducts = [
        [
            'name' => 'Stuffed Peppers',
            'category' => 'Appetizers',
            'sales' => 324,
            'revenue' => 3888.00,
            'rating' => 4.8,
            'performance_percentage' => 95
        ],
        [
            'name' => 'Beef Wellington',
            'category' => 'Main Course',
            'sales' => 268,
            'revenue' => 5360.00,
            'rating' => 4.6,
            'performance_percentage' => 85
        ],
        [
            'name' => 'Chocolate Soufflé',
            'category' => 'Desserts',
            'sales' => 215,
            'revenue' => 1720.00,
            'rating' => 4.9,
            'performance_percentage' => 90
        ],
        [
            'name' => 'Signature Cocktail',
            'category' => 'Beverages',
            'sales' => 198,
            'revenue' => 1782.00,
            'rating' => 4.4,
            'performance_percentage' => 75
        ],
    ];
    
    // Product variants performance
    $productVariants = [
        [
            'name' => 'Red Variant',
            'color_hex' => '#ef4444',
            'stock' => 45,
            'sales' => 28,
            'conversion_rate' => 8.2,
            'status' => 'Active',
            'status_class' => 'active'
        ],
        [
            'name' => 'Blue Variant',
            'color_hex' => '#3b82f6',
            'stock' => 5,
            'sales' => 32,
            'conversion_rate' => 9.5,
            'status' => 'Low Stock',
            'status_class' => 'low'
        ],
        [
            'name' => 'Green Variant',
            'color_hex' => '#10b981',
            'stock' => 0,
            'sales' => 0,
            'conversion_rate' => 0.0,
            'status' => 'Out of Stock',
            'status_class' => 'out'
        ],
        [
            'name' => 'Yellow Variant',
            'color_hex' => '#f59e0b',
            'stock' => 23,
            'sales' => 15,
            'conversion_rate' => 6.4,
            'status' => 'Active',
            'status_class' => 'active'
        ],
        [
            'name' => 'Purple Variant',
            'color_hex' => '#8b5cf6',
            'stock' => 18,
            'sales' => 12,
            'conversion_rate' => 5.8,
            'status' => 'Active',
            'status_class' => 'active'
        ]
    ];
    
    // Category distribution
    $categoryDistribution = [
        ['category' => 'Appetizers', 'value' => 35],
        ['category' => 'Main Course', 'value' => 42],
        ['category' => 'Desserts', 'value' => 18],
        ['category' => 'Beverages', 'value' => 25],
        ['category' => 'Sides', 'value' => 12],
        ['category' => 'Specials', 'value' => 10]
    ];
    
    // Ratings distribution
    $ratingsDistribution = [
        5 => 68,
        4 => 22,
        3 => 7,
        2 => 2,
        1 => 1
    ];
    
    // Feedback topics
    $feedbackTopics = [
        [
            'name' => 'Flavor',
            'percentage' => 85,
            'sentiment' => 'positive'
        ],
        [
            'name' => 'Presentation',
            'percentage' => 78,
            'sentiment' => 'positive'
        ],
        [
            'name' => 'Portion Size',
            'percentage' => 64,
            'sentiment' => 'neutral'
        ],
        [
            'name' => 'Wait Time',
            'percentage' => 45,
            'sentiment' => 'negative'
        ],
        [
            'name' => 'Value',
            'percentage' => 72,
            'sentiment' => 'positive'
        ]
    ];
    
    // Combine all metrics
    $productMetrics = [
        'total_products' => $totalProducts,
        'growth_percentage' => $growthPercentage,
        'new_products' => $newProducts,
        'avg_rating' => $avgRating,
        'conversion_rate' => $conversionRate,
        'top_products' => $topProducts,
        'product_variants' => $productVariants,
        'category_distribution' => $categoryDistribution,
        'ratings_distribution' => $ratingsDistribution,
        'feedback_topics' => $feedbackTopics,
        'category_distribution' => [
            ['category' => 'Appetizers', 'value' => 35],
            ['category' => 'Main Courses', 'value' => 25],
            ['category' => 'Desserts', 'value' => 15],
            ['category' => 'Beverages', 'value' => 20],
            ['category' => 'Others', 'value' => 5]
        ],
    ];
    
    // Generate product performance data
    $productData = [];
    
    for ($i = $period; $i >= 0; $i--) {
        $date = Carbon::now()->subDays($i)->format('Y-m-d');
        
        // Generate some random data with an upward trend
        $baseViews = 100 + ($period - $i) * 3;
        $baseSales = 10 + ($period - $i) * 0.5;
        $baseRevenue = 300 + ($period - $i) * 12;
        
        // Add some randomness
        $views = max(0, $baseViews + rand(-20, 20));
        $sales = max(0, $baseSales + rand(-5, 5));
        $revenue = max(0, $baseRevenue + rand(-50, 50));
        
        $productData[] = [
            'date' => $date,
            'views' => $views,
            'sales' => $sales,
            'revenue' => $revenue
        ];
    }
    
    return view('reports.products', compact('productData', 'productMetrics', 'period'));
}
}