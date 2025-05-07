<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Stats Overview Cards -->
    <div class="stats-overview">
        <x-stats-card 
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>'
            label="Today's Sales"
            value="K0.00"
            trend="up"
            trendValue="12%"
            metaText="0 Orders"
            cardClass="sales-card"
        />
        
        <x-stats-card 
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'
            label="Active Orders"
            value="57"
            trend="neutral"
            trendValue="0%"
            metaText="Current"
            cardClass="orders-card"
        />
        
        <x-stats-card 
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'
            label="Total Customers"
            value="1"
            trend="up"
            trendValue="5%"
            metaText="Lifetime"
            cardClass="customers-card"
        />
        
        <x-stats-card 
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>'
            label="Avg Order Value"
            value="K192,274"
            trend="down"
            trendValue="3%"
            metaText="30 Days"
            cardClass="value-card"
        />
    </div>

    <!-- Charts Row -->
    <div class="charts-row">
        <x-line-chart 
            id="ordersChart"
            title="Daily Orders Trend"
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>'
            :timeOptions="['Last 7 Days', 'Last 30 Days', 'Last 90 Days']"
            defaultTimeOption="Last 90 Days"
            height="320px"
        />

        <x-line-chart 
            id="inventoryChart"
            title="Daily Inventory Trend"
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>'
            :timeOptions="['Last 7 Days', 'Last 30 Days', 'Last 90 Days']"
            defaultTimeOption="Last 30 Days"
            height="320px"
        />
    </div>


    <!-- Popular Items Row -->
    <div class="popular-items-row">
        <x-popular-items-list 
            title="Most Popular Items"
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20V10"></path><path d="M18 20V4"></path><path d="M6 20v-4"></path></svg>'
            :items="[
                ['name' => 'Stuffed Peppers', 'percentage' => 85, 'count' => 18],
                ['name' => 'Stuffed Mushrooms', 'percentage' => 75, 'count' => 17],
                ['name' => 'Stuffed Peppers', 'percentage' => 75, 'count' => 17]
            ]"
        />

        <x-popular-items-list 
            title="Least Popular Items"
            icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20v-6"></path><path d="M6 20V10"></path><path d="M18 20V4"></path></svg>'
            :items="[
                ['name' => 'Beef Wellington', 'percentage' => 30, 'count' => 6],
                ['name' => 'Chicken Alfredo', 'percentage' => 35, 'count' => 7],
                ['name' => 'Clam Chowder', 'percentage' => 35, 'count' => 7]
            ]"
        />
    </div>

    <!-- Tables Row -->
    <div class="tables-row">
    <x-data-table 
    title="Active Orders"
    icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'
    :columns="['Order ID', 'Amount', 'Status']"
    :rows="[
        ['ORD-9012', 'K98,567.62', 'Ready'],
        ['ORD-3416', 'K85,752.38', 'Pending'],
        ['ORD-2120', 'K252,378.67', 'Ready']
    ]"
    viewAllLink="/orders"
/>

<x-data-table 
    title="Inventory Status"
    icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>'
    :columns="['Name', 'In Stock', 'Minimum Threshold', 'Status']"
    :rows="[
        ['Jam', '1', '71', 'Low Stock'],
        ['Pepper', '1', '39', 'Low Stock'],
        ['Olive Oil', '4', '65', 'Low Stock']
    ]"
    viewAllLink="/inventory"
/>
    </div>

      <!-- Modern Dashboard Styles -->
      <style>
        /* Base Styles and Variables */
        :root {
            --primary-gradient: linear-gradient(135deg, var(--accent-blue) 0%, #4f46e5 100%);
            --secondary-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --card-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --border-radius: 16px;
            --transition-speed: 0.3s;
        }
        
        /* Layout Containers */
        .stats-overview, .charts-row, .popular-items-row, .tables-row {
            display: grid;
            gap: 24px;
            margin-bottom: 24px;
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .stats-overview {
            grid-template-columns: repeat(4, 1fr);
        }
        
        .charts-row, .popular-items-row, .tables-row {
            grid-template-columns: repeat(2, 1fr);
        }
        
        @media (max-width: 1280px) {
            .stats-overview {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .stats-overview, .charts-row, .popular-items-row, .tables-row {
                grid-template-columns: 1fr;
            }
        }
        
        /* Card Base Styles */
        .stat-card, .chart-card, .popular-card, .table-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all var(--transition-speed) ease;
            position: relative;
            border: 1px solid var(--border-color);
        }
        
        .stat-card:hover, .chart-card:hover, .popular-card:hover, .table-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }
        
        /* Stat Cards */
        .stat-card {
            padding: 24px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--content-bg);
            transition: all var(--transition-speed) ease;
        }
        
        .stat-icon svg {
            width: 24px;
            height: 24px;
            stroke: var(--accent-blue);
            transition: all var(--transition-speed) ease;
        }
        
        .stat-card:hover .stat-icon {
            background: var(--accent-blue);
        }
        
        .stat-card:hover .stat-icon svg {
            stroke: white;
        }
        
        .sales-card:hover .stat-icon {
            background: #3b82f6;
        }
        
        .orders-card:hover .stat-icon {
            background: #8b5cf6;
        }
        
        .customers-card:hover .stat-icon {
            background: #10b981;
        }
        
        .value-card:hover .stat-icon {
            background: #f59e0b;
        }
        
        .stat-content {
            flex: 1;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: var(--secondary-text);
            margin-bottom: 8px;
        }
        
        .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }
        
        .stat-meta {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: var(--muted-text);
        }
        
        .trend {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .trend svg {
            width: 14px;
            height: 14px;
            margin-right: 4px;
        }
        
        .trend.up {
            color: #10b981;
            background-color: rgba(16, 185, 129, 0.1);
        }
        
        .trend.down {
            color: #ef4444;
            background-color: rgba(239, 68, 68, 0.1);
        }
        
        .trend.neutral {
            color: #6b7280;
            background-color: rgba(107, 114, 128, 0.1);
        }
        
        .divider {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: var(--muted-text);
            margin: 0 8px;
            opacity: 0.5;
        }
        
        /* Chart Cards */
        .chart-card, .popular-card, .table-card {
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .card-title {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .card-title svg {
            width: 18px;
            height: 18px;
            stroke: var(--accent-blue);
        }
        
        .card-actions {
            display: flex;
            gap: 8px;
        }
        
        .time-select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background-color: var(--card-bg);
            color: var(--primary-text);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
        }
        
        .time-select:hover {
            border-color: var(--accent-blue);
        }
        
        .btn-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: var(--content-bg);
            color: var(--secondary-text);
            border: none;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
        }
        
        .btn-icon:hover {
            background-color: var(--accent-blue);
            color: white;
        }
        
        .btn-icon svg {
            width: 18px;
            height: 18px;
        }
        
        .btn-text {
            padding: 8px 16px;
            border-radius: 8px;
            background-color: transparent;
            color: var(--accent-blue);
            border: none;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
        }
        
        .btn-text:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }
        
        .chart-container {
            height: 280px;
            padding: 16px 24px 24px;
            position: relative;
        }
        
        /* Popular Items */
        .popular-items-list {
            padding: 8px 24px 24px;
        }
        
        .popular-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            gap: 16px;
            border-bottom: 1px solid var(--border-color);
            transition: all var(--transition-speed) ease;
        }
        
        .popular-item:last-child {
            border-bottom: none;
        }
        
        .popular-item:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        .item-rank {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: var(--content-bg);
            color: var(--secondary-text);
            font-size: 0.875rem;
            font-weight: 600;
        }
        
        .item-info {
            flex: 1;
            min-width: 0;
        }
        
        .item-name {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .item-progress {
            height: 6px;
            background-color: var(--content-bg);
            border-radius: 3px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: 3px;
        }
        
        .popular-card:nth-child(2) .progress-bar {
            background: var(--danger-gradient);
        }
        
        .item-count {
            font-size: 0.75rem;
            color: var(--accent-blue);
            font-weight: 500;
            white-space: nowrap;
        }
        
        /* Tables */
        .table-container {
            padding: 0 24px 24px;
            overflow-x: auto;
        }
        
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.875rem;
        }
        
        .data-table th {
            text-align: left;
            padding: 12px 16px;
            font-weight: 600;
            color: var(--secondary-text);
            border-bottom: 2px solid var(--border-color);
            background-color: var(--content-bg);
        }
        
        .data-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            transition: background-color var(--transition-speed) ease;
        }
        
        .data-table tr:hover td {
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            position: relative;
        }
        
        .status::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 8px;
        }
        
        .status-ready {
            background-color: var(--status-green-bg);
            color: var(--status-green-text);
        }
        
        .status-ready::before {
            background-color: var(--status-green-text);
        }
        
        .status-pending {
            background-color: var(--status-orange-bg);
            color: var(--status-orange-text);
        }
        
        .status-pending::before {
            background-color: var(--status-orange-text);
        }
        
        .status-low {
            background-color: var(--status-red-bg);
            color: var(--status-red-text);
        }
        
        .status-low::before {
            background-color: var(--status-red-text);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stats-overview {
            animation-delay: 0.1s;
        }
        
        .charts-row {
            animation-delay: 0.2s;
        }
        
        .popular-items-row {
            animation-delay: 0.3s;
        }
        
        .tables-row {
            animation-delay: 0.4s;
        }
        
        /* Chart Customizations */
        #ordersChart, #inventoryChart {
            --chart-line-color: var(--accent-blue);
            --chart-area-color: rgba(59, 130, 246, 0.1);
            --chart-point-color: var(--accent-blue);
            --chart-grid-color: var(--chart-grid);
        }

        /* Enhanced Chart Styling */
.chart-container {
    height: 320px !important; /* Match the height from your component */
    padding: 20px 16px 24px;
    position: relative;
    transition: all 0.3s ease;
}

/* Add a subtle hover effect to chart containers */
.chart-container:hover {
    transform: translateY(-2px);
}

/* Chart card header improvements */
.chart-card .card-header {
    padding: 20px 24px;
    background: var(--card-bg);
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 5;
}

/* Style chart title icons */
.chart-card .card-title svg {
    width: 18px;
    height: 18px;
    stroke: var(--accent-blue);
    transition: all 0.3s ease;
}

/* Orders chart specific styling */
#ordersChart .card-title svg {
    stroke: #4f46e5; /* Match the chart line color */
}

#ordersChart:hover .card-title svg {
    stroke: #6366f1; /* Lighter on hover */
}

/* Inventory chart specific styling */
#inventoryChart .card-title svg {
    stroke: #10b981; /* Match the chart line color */
}

#inventoryChart:hover .card-title svg {
    stroke: #059669; /* Darker on hover */
}

/* Improved time selector styling */
.time-select {
    padding: 8px 14px;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    background-color: var(--card-bg);
    color: var(--primary-text);
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    outline: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
    padding-right: 32px;
}

.time-select:hover {
    border-color: var(--accent-blue);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.time-select:focus {
    border-color: var(--accent-blue);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
}

/* Add subtle loading animations for charts */
@keyframes chartFadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

#ordersLineChart, #inventoryLineChart {
    animation: chartFadeIn 0.8s ease-out forwards;
}

/* Dark theme compatibility improvements */
@media (prefers-color-scheme: dark) {
    .chart-container canvas {
        filter: brightness(0.95);
    }
}

/* Loading state for charts (can be applied with JS when data is refreshing) */
.chart-container.is-loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.chart-container.is-loading::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 40px;
    height: 40px;
    border: 3px solid rgba(79, 70, 229, 0.1);
    border-radius: 50%;
    border-top-color: var(--accent-blue);
    animation: spin 1s linear infinite;
    z-index: 11;
}

@keyframes spin {
    to {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

/* =========== Popular Items Cards =========== */
.popular-items-row {
    gap: 24px;
    margin-bottom: 32px;
    animation: fadeInUp 0.6s ease-out forwards;
    animation-delay: 0.3s;
}

.popular-card {
    box-shadow: var(--card-shadow);
    border-radius: var(--border-radius);
    transition: all 0.3s ease;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    overflow: hidden;
}

.popular-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--card-shadow-hover);
}

/* Card Header Styling */
.popular-card .card-header {
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border-color);
}

.popular-card .card-title {
    font-size: 1rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
}

.popular-card .card-title svg {
    width: 18px;
    height: 18px;
    transition: all 0.3s ease;
}

/* Unique colors for each popular items card */
.popular-card:nth-child(1) .card-title svg {
    stroke: #4f46e5; /* Match orders chart color */
}

.popular-card:nth-child(2) .card-title svg {
    stroke: #ef4444; /* Red for least popular */
}

.popular-items-list {
    padding: 8px 24px 24px;
}

/* Popular Item Styling */
.popular-item {
    display: flex;
    align-items: center;
    padding: 16px 0;
    gap: 16px;
    border-bottom: 1px solid var(--border-color);
    transition: all 0.3s ease;
}

.popular-item:last-child {
    border-bottom: none;
}

.popular-item:hover {
    transform: translateX(5px);
    background-color: rgba(59, 130, 246, 0.05);
}

.item-rank {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background-color: var(--content-bg);
    color: var(--secondary-text);
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.popular-item:hover .item-rank {
    background-color: var(--accent-blue);
    color: white;
}

/* Different colors for most popular vs least popular */
.popular-card:nth-child(1) .popular-item:hover .item-rank {
    background-color: #4f46e5;
}

.popular-card:nth-child(2) .popular-item:hover .item-rank {
    background-color: #ef4444;
}

.item-info {
    flex: 1;
    min-width: 0;
}

.item-name {
    display: block;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: all 0.2s ease;
}

.popular-item:hover .item-name {
    color: var(--accent-blue);
}

.popular-card:nth-child(1) .popular-item:hover .item-name {
    color: #4f46e5;
}

.popular-card:nth-child(2) .popular-item:hover .item-name {
    color: #ef4444;
}

.item-progress {
    height: 8px;
    background-color: var(--content-bg);
    border-radius: 4px;
    overflow: hidden;
    position: relative;
}

.progress-bar {
    height: 100%;
    border-radius: 4px;
    transition: width 1s ease-out;
    position: relative;
    overflow: hidden;
}

/* Progress bar styles for most popular */
.popular-card:nth-child(1) .progress-bar {
    background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
}

/* Progress bar styles for least popular */
.popular-card:nth-child(2) .progress-bar {
    background: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
}

/* Add shine animation to progress bars */
.progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, transparent 0%, rgba(255, 255, 255, 0.2) 50%, transparent 100%);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        left: -100%;
    }
    100% {
        left: 100%;
    }
}

.item-count {
    font-size: 0.75rem;
    font-weight: 600;
    white-space: nowrap;
    padding: 4px 8px;
    border-radius: 12px;
    transition: all 0.3s ease;
    background: rgba(79, 70, 229, 0.1);
    color: #4f46e5;
}

.popular-card:nth-child(2) .item-count {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.popular-item:hover .item-count {
    color: white;
}

.popular-card:nth-child(1) .popular-item:hover .item-count {
    background: #4f46e5;
}

.popular-card:nth-child(2) .popular-item:hover .item-count {
    background: #ef4444;
}

/* =========== Data Tables Styling =========== */
.tables-row {
    gap: 24px;
    margin-bottom: 32px;
    animation: fadeInUp 0.6s ease-out forwards;
    animation-delay: 0.4s;
}

.table-card {
    box-shadow: var(--card-shadow);
    border-radius: var(--border-radius);
    transition: all 0.3s ease;
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    overflow: hidden;
}

.table-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--card-shadow-hover);
}

/* Card Header Styling */
.table-card .card-header {
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border-color);
}

.table-card .card-title {
    font-size: 1rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
}

.table-card .card-title svg {
    width: 18px;
    height: 18px;
    transition: all 0.3s ease;
}

/* Unique colors for each table card */
.table-card:nth-child(1) .card-title svg {
    stroke: #8b5cf6; /* Purple for orders */
}

.table-card:nth-child(2) .card-title svg {
    stroke: #10b981; /* Green for inventory */
}

.table-container {
    padding: 0;
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 0.875rem;
}

.data-table th {
    text-align: left;
    padding: 16px 24px;
    font-weight: 600;
    color: var(--secondary-text);
    border-bottom: 2px solid var(--border-color);
    position: sticky;
    top: 0;
    background-color: var(--card-bg);
    z-index: 10;
}

.data-table td {
    padding: 16px 24px;
    border-bottom: 1px solid var(--border-color);
    transition: all 0.2s ease;
}

.data-table tr {
    transition: all 0.2s ease;
}

.data-table tr:hover td {
    background-color: rgba(79, 70, 229, 0.05);
}

.data-table tr:last-child td {
    border-bottom: none;
}

/* Enhanced status indicators */
.status {
    display: inline-flex;
    align-items: center;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    position: relative;
    transition: all 0.3s ease;
}

.status::before {
    content: '';
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-right: 8px;
    transition: all 0.3s ease;
}

.status-ready {
    background-color: rgba(16, 185, 129, 0.1);
    color: #10b981;
}

.status-ready::before {
    background-color: #10b981;
    box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
}

.status-pending {
    background-color: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
}

.status-pending::before {
    background-color: #f59e0b;
    box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.2);
}

.status-low {
    background-color: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.status-low::before {
    background-color: #ef4444;
    box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.2);
}

/* Enhance hover effect for status */
tr:hover .status-ready {
    background-color: rgba(16, 185, 129, 0.2);
}

tr:hover .status-pending {
    background-color: rgba(245, 158, 11, 0.2);
}

tr:hover .status-low {
    background-color: rgba(239, 68, 68, 0.2);
}

/* "View All" link styling */
.card-actions .btn-text {
    padding: 8px 16px;
    border-radius: 8px;
    color: var(--accent-blue);
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.card-actions .btn-text:hover {
    background-color: rgba(79, 70, 229, 0.1);
    transform: translateX(2px);
}


/* Adjust table card colors */
.table-card:nth-child(1) .card-actions .btn-text {
    color: #8b5cf6;
}

.table-card:nth-child(1) .card-actions .btn-text:hover {
    background-color: rgba(139, 92, 246, 0.1);
}

.table-card:nth-child(2) .card-actions .btn-text {
    color: #10b981;
}

.table-card:nth-child(2) .card-actions .btn-text:hover {
    background-color: rgba(16, 185, 129, 0.1);
}

/* Add skeleton loading animation */
@keyframes pulse {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
    }
}

.is-loading .item-name,
.is-loading .item-progress,
.is-loading .item-count,
.is-loading td {
    position: relative;
    color: transparent !important;
    overflow: hidden;
}

.is-loading .item-name::after,
.is-loading .item-progress::after,
.is-loading .item-count::after,
.is-loading td::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--content-bg);
    animation: pulse 1.5s infinite ease-in-out;
    border-radius: 4px;
}

/* Empty state styling */
.empty-state {
    padding: 48px 24px;
    text-align: center;
    color: var(--secondary-text);
}

.empty-state svg {
    width: 48px;
    height: 48px;
    stroke: var(--border-color);
    margin-bottom: 16px;
}

.empty-state-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 8px;
}

.empty-state-text {
    font-size: 0.875rem;
    color: var(--muted-text);
    max-width: 300px;
    margin: 0 auto;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .data-table th, 
    .data-table td {
        padding: 12px 16px;
    }
    
    .item-rank {
        width: 32px;
        height: 32px;
    }
}

    </style>

     <!-- Enhanced Charts initialization script -->
     <script>
       document.addEventListener('DOMContentLoaded', function() {
    // Common chart configuration
    const chartConfig = {
        // Custom color schemes for different charts
        colors: {
            orders: {
                line: '#4f46e5',
                gradient: ['rgba(79, 70, 229, 0.3)', 'rgba(79, 70, 229, 0.01)'],
                point: '#4f46e5',
                pointHover: '#6366f1'
            },
            inventory: {
                line: '#10b981',
                gradient: ['rgba(16, 185, 129, 0.3)', 'rgba(16, 185, 129, 0.01)'],
                point: '#10b981',
                pointHover: '#059669'
            }
        },
        // Chart.js shared options
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500,
                easing: 'easeOutQuart'
            },
            layout: {
                padding: {
                    top: 10,
                    right: 25,
                    bottom: 10,
                    left: 25
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(226, 232, 240, 0.6)',
                        drawBorder: false,
                        borderDash: [5, 5]
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        padding: 12,
                        font: {
                            size: 11,
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: 'rgba(100, 116, 139, 0.8)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        padding: 12,
                        font: {
                            size: 11,
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: 'rgba(100, 116, 139, 0.8)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    align: 'end',
                    labels: {
                        boxWidth: 12,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        padding: 20,
                        font: {
                            size: 12,
                            family: 'Inter, system-ui, sans-serif',
                            weight: '500'
                        },
                        color: 'rgba(51, 65, 85, 0.9)'
                    }
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: 'rgba(255, 255, 255, 0.95)',
                    titleColor: 'rgba(15, 23, 42, 0.9)',
                    bodyColor: 'rgba(51, 65, 85, 0.9)',
                    borderColor: 'rgba(226, 232, 240, 0.8)',
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    titleFont: {
                        size: 13,
                        weight: '600',
                        family: 'Inter, system-ui, sans-serif'
                    },
                    bodyFont: {
                        size: 12,
                        family: 'Inter, system-ui, sans-serif'
                    },
                    callbacks: {
                        title: function(tooltipItems) {
                            return tooltipItems[0].label;
                        }
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            elements: {
                line: {
                    borderWidth: 3,
                    borderJoinStyle: 'round',
                    tension: 0.4
                },
                point: {
                    radius: 3,
                    hitRadius: 10,
                    hoverRadius: 6,
                    borderWidth: 2
                }
            }
        }
    };

    // Function to create gradient backgrounds
    function createGradient(ctx, colors) {
        const gradient = ctx.createLinearGradient(0, 0, 0, ctx.canvas.height);
        gradient.addColorStop(0, colors[0]);
        gradient.addColorStop(1, colors[1]);
        return gradient;
    }

    // Initialize Orders Chart
    const ordersCtx = document.createElement('canvas');
    ordersCtx.id = 'ordersLineChart';
    document.getElementById('ordersChart').appendChild(ordersCtx);
    
    const ordersGradient = createGradient(ordersCtx.getContext('2d'), chartConfig.colors.orders.gradient);
    
    const ordersData = {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        datasets: [{
            label: 'Orders',
            data: [4, 6, 12, 3, 6],
            borderColor: chartConfig.colors.orders.line,
            backgroundColor: ordersGradient,
            pointBackgroundColor: chartConfig.colors.orders.point,
            pointHoverBackgroundColor: chartConfig.colors.orders.pointHover,
            pointBorderColor: '#fff',
            pointHoverBorderColor: '#fff',
            fill: true
        }]
    };

    // Use deep clone to avoid reference issues with shared options
    const ordersOptions = JSON.parse(JSON.stringify(chartConfig.options));
    
    // Customize specific options for Orders chart
    ordersOptions.plugins.tooltip.callbacks.label = function(context) {
        return context.parsed.y + ' Orders';
    };
    
    ordersOptions.scales.y.ticks.stepSize = 2;

    const ordersChart = new Chart(ordersCtx, {
        type: 'line',
        data: ordersData,
        options: ordersOptions
    });

    // Initialize Inventory Chart
    const inventoryCtx = document.createElement('canvas');
    inventoryCtx.id = 'inventoryLineChart';
    document.getElementById('inventoryChart').appendChild(inventoryCtx);
    
    const inventoryGradient = createGradient(inventoryCtx.getContext('2d'), chartConfig.colors.inventory.gradient);
    
    const inventoryData = {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        datasets: [{
            label: 'Inventory',
            data: [16, 9, 17, 20, 3],
            borderColor: chartConfig.colors.inventory.line,
            backgroundColor: inventoryGradient,
            pointBackgroundColor: chartConfig.colors.inventory.point,
            pointHoverBackgroundColor: chartConfig.colors.inventory.pointHover,
            pointBorderColor: '#fff',
            pointHoverBorderColor: '#fff',
            fill: true
        }]
    };

    // Use deep clone to avoid reference issues with shared options
    const inventoryOptions = JSON.parse(JSON.stringify(chartConfig.options));
    
    // Customize specific options for Inventory chart
    inventoryOptions.plugins.tooltip.callbacks.label = function(context) {
        return context.parsed.y + ' Items';
    };
    
    inventoryOptions.scales.y.ticks.stepSize = 5;

    const inventoryChart = new Chart(inventoryCtx, {
        type: 'line',
        data: inventoryData,
        options: inventoryOptions
    });

    // Handle time period selector changes
    document.querySelectorAll('.time-select').forEach(select => {
        select.addEventListener('change', function() {
            const chartId = this.closest('.chart-card').id;
            const period = this.value;
            
            // Here you would typically fetch new data based on the selected time period
            // For this example, we'll just update with random data
            let newData;
            
            if (chartId === 'ordersChart') {
                newData = Array.from({length: 5}, () => Math.floor(Math.random() * 15) + 1);
                ordersChart.data.datasets[0].data = newData;
                ordersChart.update();
            } else if (chartId === 'inventoryChart') {
                newData = Array.from({length: 5}, () => Math.floor(Math.random() * 25) + 1);
                inventoryChart.data.datasets[0].data = newData;
                inventoryChart.update();
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Initialize progress bars with animation
    initProgressBars();
    
    // Add interactive hover effects to table rows
    enhanceTableInteractions();
    
    // Add view all button effects
    enhanceViewAllButtons();
});

/**
 * Animates the width of progress bars when in viewport
 */
function initProgressBars() {
    const progressBars = document.querySelectorAll('.progress-bar');
    
    // Initially set width to 0
    progressBars.forEach(bar => {
        bar.style.width = '0%';
    });
    
    // Create an observer to animate progress bars when they come into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Get the percentage from the data attribute or parent element
                const percentage = entry.target.getAttribute('data-percentage') || 
                                   entry.target.parentElement.getAttribute('data-percentage');
                
                // Animate the progress bar width
                setTimeout(() => {
                    entry.target.style.width = percentage + '%';
                }, 200);
                
                // Stop observing once animated
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    
    // Observe each progress bar
    progressBars.forEach(bar => {
        observer.observe(bar);
    });
}

/**
 * Enhances table rows with hover effects and status style updates
 */
function enhanceTableInteractions() {
    const tableRows = document.querySelectorAll('.data-table tr');
    
    tableRows.forEach(row => {
        // Skip header rows
        if (row.querySelector('th')) return;
        
        // Add click interaction
        row.addEventListener('click', function() {
            // You could navigate to a detail page or show a modal here
            console.log('Row clicked:', this.querySelector('td').textContent);
        });
        
        // Make rows feel interactive
        row.style.cursor = 'pointer';
    });
    
    // Process status indicators
    const statusElements = document.querySelectorAll('.status');
    
    statusElements.forEach(status => {
        const text = status.textContent.trim().toLowerCase();
        
        if (text.includes('ready')) {
            status.classList.add('status-ready');
        } else if (text.includes('pending')) {
            status.classList.add('status-pending');
        } else if (text.includes('low')) {
            status.classList.add('status-low');
        }
    });
}

/**
 * Adds animations to view all buttons
 */
function enhanceViewAllButtons() {
    const viewAllButtons = document.querySelectorAll('.btn-text');
    
    viewAllButtons.forEach(button => {
        // Add hover effect if not already styled
        if (!button.textContent.includes('→')) {
            button.innerHTML = button.textContent + ' <span class="arrow">→</span>';
        }
    });
}

/**
 * Updates the popular items based on selected time period
 * Note: In a real application, this would fetch data from the server
 */
function updatePopularItems(cardId, period) {
    const card = document.getElementById(cardId);
    
    if (!card) return;
    
    // Add loading state
    card.classList.add('is-loading');
    
    // Simulate API request
    setTimeout(() => {
        // Remove loading state
        card.classList.remove('is-loading');
        
        // Update data (this would come from your API)
        const items = card.querySelectorAll('.popular-item');
        
        items.forEach((item, index) => {
            // Generate random data for demo purposes
            const newPercentage = Math.floor(Math.random() * 60) + (cardId.includes('most') ? 40 : 10);
            const newCount = Math.floor(newPercentage / 5) + 1;
            
            // Update progress bar
            const progressBar = item.querySelector('.progress-bar');
            progressBar.style.width = newPercentage + '%';
            
            // Update count
            const countElement = item.querySelector('.item-count');
            if (countElement) {
                countElement.textContent = newCount;
            }
        });
    }, 800);
}
    </script>
@endsection