@extends('layouts.app')

@section('content')
    <!-- Stats Overview Cards - Modern Design with Gradients -->
    <div class="stats-overview">
        <!-- Today's Sales -->
        <div class="stat-card sales-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Today's Sales</div>
                <div class="stat-value">K0.00</div>
                <div class="stat-meta">
                    <div class="trend up">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span>12%</span>
                    </div>
                    <span class="divider"></span>
                    <span>0 Orders</span>
                </div>
            </div>
        </div>
        
        <!-- Active Orders -->
        <div class="stat-card orders-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Active Orders</div>
                <div class="stat-value">57</div>
                <div class="stat-meta">
                    <div class="trend neutral">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>0%</span>
                    </div>
                    <span class="divider"></span>
                    <span>Current</span>
                </div>
            </div>
        </div>
        
        <!-- Total Customers -->
        <div class="stat-card customers-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Customers</div>
                <div class="stat-value">1</div>
                <div class="stat-meta">
                    <div class="trend up">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <span>5%</span>
                    </div>
                    <span class="divider"></span>
                    <span>Lifetime</span>
                </div>
            </div>
        </div>
        
        <!-- Average Order Value -->
        <div class="stat-card value-card">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Avg Order Value</div>
                <div class="stat-value">K192,274</div>
                <div class="stat-meta">
                    <div class="trend down">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                            <polyline points="17 18 23 18 23 12"></polyline>
                        </svg>
                        <span>3%</span>
                    </div>
                    <span class="divider"></span>
                    <span>30 Days</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row - Enhanced with better spacing and modern design -->
    <div class="charts-row">
        <!-- Daily Orders Trend -->
        <div class="chart-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                    Daily Orders Trend
                </h3>
                <div class="card-actions">
                    <select class="time-select">
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option selected>Last 90 Days</option>
                    </select>
                </div>
            </div>
            <div class="chart-container" id="ordersChart"></div>
        </div>

        <!-- Daily Inventory Trend -->
        <div class="chart-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                    Daily Inventory Trend
                </h3>
                <div class="card-actions">
                    <select class="time-select">
                        <option>Last 7 Days</option>
                        <option selected>Last 30 Days</option>
                        <option>Last 90 Days</option>
                    </select>
                </div>
            </div>
            <div class="chart-container" id="inventoryChart"></div>
        </div>
    </div>

    <!-- Popular Items Row - Enhanced with better visualization -->
    <div class="popular-items-row">
        <!-- Most Popular Items -->
        <div class="popular-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20V10"></path>
                        <path d="M18 20V4"></path>
                        <path d="M6 20v-4"></path>
                    </svg>
                    Most Popular Items
                </h3>
                <div class="card-actions">
                    <button class="btn-icon" aria-label="More options">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="popular-items-list">
                <div class="popular-item">
                    <div class="item-rank">1</div>
                    <div class="item-info">
                        <span class="item-name">Stuffed Peppers</span>
                        <div class="item-progress">
                            <div class="progress-bar" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="item-count">18 orders</div>
                </div>
                <div class="popular-item">
                    <div class="item-rank">2</div>
                    <div class="item-info">
                        <span class="item-name">Stuffed Mushrooms</span>
                        <div class="item-progress">
                            <div class="progress-bar" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="item-count">17 orders</div>
                </div>
                <div class="popular-item">
                    <div class="item-rank">3</div>
                    <div class="item-info">
                        <span class="item-name">Stuffed Peppers</span>
                        <div class="item-progress">
                            <div class="progress-bar" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="item-count">17 orders</div>
                </div>
            </div>
        </div>

        <!-- Least Popular Items -->
        <div class="popular-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20v-6"></path>
                        <path d="M6 20V10"></path>
                        <path d="M18 20V4"></path>
                    </svg>
                    Least Popular Items
                </h3>
                <div class="card-actions">
                    <button class="btn-icon" aria-label="More options">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="popular-items-list">
                <div class="popular-item">
                    <div class="item-rank">1</div>
                    <div class="item-info">
                        <span class="item-name">Beef Wellington</span>
                        <div class="item-progress">
                            <div class="progress-bar" style="width: 30%"></div>
                        </div>
                    </div>
                    <div class="item-count">6 orders</div>
                </div>
                <div class="popular-item">
                    <div class="item-rank">2</div>
                    <div class="item-info">
                        <span class="item-name">Chicken Alfredo</span>
                        <div class="item-progress">
                            <div class="progress-bar" style="width: 35%"></div>
                        </div>
                    </div>
                    <div class="item-count">7 orders</div>
                </div>
                <div class="popular-item">
                    <div class="item-rank">3</div>
                    <div class="item-info">
                        <span class="item-name">Clam Chowder</span>
                        <div class="item-progress">
                            <div class="progress-bar" style="width: 35%"></div>
                        </div>
                    </div>
                    <div class="item-count">7 orders</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Row - Enhanced with better spacing and modern design -->
    <div class="tables-row">
        <!-- Active Orders -->
        <div class="table-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    Active Orders
                </h3>
                <div class="card-actions">
                    <button class="btn-text">View All</button>
                </div>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ORD-9012</td>
                            <td>K98,567.62</td>
                            <td><span class="status status-ready">Ready</span></td>
                        </tr>
                        <tr>
                            <td>ORD-3416</td>
                            <td>K85,752.38</td>
                            <td><span class="status status-pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>ORD-2120</td>
                            <td>K252,378.67</td>
                            <td><span class="status status-ready">Ready</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Inventory Status -->
        <div class="table-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                    Inventory Status
                </h3>
                <div class="card-actions">
                    <button class="btn-text">View All</button>
                </div>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>In Stock</th>
                            <th>Minimum Threshold</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jam</td>
                            <td>1</td>
                            <td>71</td>
                            <td><span class="status status-low">Low Stock</span></td>
                        </tr>
                        <tr>
                            <td>Pepper</td>
                            <td>1</td>
                            <td>39</td>
                            <td><span class="status status-low">Low Stock</span></td>
                        </tr>
                        <tr>
                            <td>Olive Oil</td>
                            <td>4</td>
                            <td>65</td>
                            <td><span class="status status-low">Low Stock</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
    </style>

    <!-- Enhanced Charts initialization script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Orders Chart Data
            const ordersCtx = document.createElement('canvas');
            ordersCtx.id = 'ordersLineChart';
            document.getElementById('ordersChart').appendChild(ordersCtx);
            
            const ordersData = {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                datasets: [{
                    label: 'Orders',
                    data: [4, 6, 12, 3, 6],
                    borderColor: 'var(--chart-line-color)',
                    backgroundColor: 'var(--chart-area-color)',
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: 'var(--chart-point-color)',
                    borderWidth: 3,
                    fill: true
                }]
            };

            const ordersChart = new Chart(ordersCtx, {
                type: 'line',
                data: ordersData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'var(--chart-grid-color)',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 2,
                                padding: 10,
                                font: {
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'var(--chart-grid-color)',
                                display: true
                            },
                            ticks: {
                                padding: 10,
                                font: {
                                    size: 11
                                }
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
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'var(--card-bg)',
                            titleColor: 'var(--primary-text)',
                            bodyColor: 'var(--secondary-text)',
                            borderColor: 'var(--border-color)',
                            borderWidth: 1,
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: false,
                            titleFont: {
                                size: 13,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 12
                            },
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' Orders';
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
                            borderJoinStyle: 'round'
                        }
                    }
                }
            });

            // Inventory Chart Data
            const inventoryCtx = document.createElement('canvas');
            inventoryCtx.id = 'inventoryLineChart';
            document.getElementById('inventoryChart').appendChild(inventoryCtx);
            
            const inventoryData = {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                datasets: [{
                    label: 'Inventory',
                    data: [16, 9, 17, 20, 3],
                    borderColor: 'var(--chart-line-color)',
                    backgroundColor: 'var(--chart-area-color)',
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: 'var(--chart-point-color)',
                    borderWidth: 3,
                    fill: true
                }]
            };

            const inventoryChart = new Chart(inventoryCtx, {
                type: 'line',
                data: inventoryData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'var(--chart-grid-color)',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 5,
                                padding: 10,
                                font: {
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'var(--chart-grid-color)',
                                display: true
                            },
                            ticks: {
                                padding: 10,
                                font: {
                                    size: 11
                                }
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
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'var(--card-bg)',
                            titleColor: 'var(--primary-text)',
                            bodyColor: 'var(--secondary-text)',
                            borderColor: 'var(--border-color)',
                            borderWidth: 1,
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: false,
                            titleFont: {
                                size: 13,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 12
                            },
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' Items';
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
                            borderJoinStyle: 'round'
                        }
                    }
                }
            });
        });
    </script>
@endsection