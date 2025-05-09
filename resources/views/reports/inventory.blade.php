@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/inventory-styles.css') }}">
    <!-- Additional CSS -->

@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
            Inventory Analysis Report
        </h1>
        <div class="date">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            Today: {{ \Carbon\Carbon::now()->format('F j, Y') }}

        </div>
    </div>

    <!-- Inventory Report Content -->
    <div class="inventory-report animate-fadeIn">
        <!-- Report Header -->
        <div class="report-header">
            <div class="report-controls">
                <div class="period-selector">
                    <label for="period">Time Period</label>
                    <select id="period" onchange="location.href='?period='+this.value">
                        <option value="7" {{ $period == 7 ? 'selected' : '' }}>Last 7 Days</option>
                        <option value="30" {{ $period == 30 ? 'selected' : '' }}>Last 30 Days</option>
                        <option value="90" {{ $period == 90 ? 'selected' : '' }}>Last 90 Days</option>
                        <option value="365" {{ $period == 365 ? 'selected' : '' }}>Last Year</option>
                    </select>
                </div>
                
                <div class="report-actions">
                    <button class="btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        Export as PDF
                    </button>
                    
                    <button class="btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Download CSV
                    </button>
                    
                    <button class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                            <line x1="12" y1="16" x2="12" y2="8"></line>
                        </svg>
                        Schedule Report
                    </button>
                </div>
            </div>
            
            <div class="report-metrics">
                <div class="metric-card">
                    <div class="metric-icon stock">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $inventoryMetrics['in_stock'] }}</h3>
                        <p>In Stock Items</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            {{ number_format($inventoryMetrics['stock_percentage'], 1) }}%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon turnover">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ number_format($inventoryMetrics['turnover_rate'], 1) }}</h3>
                        <p>Turnover Rate</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            7.3%
                        </div>
                    </div>
                </div>
                 
                <div class="metric-card">
                    <div class="metric-icon low-stock">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 16v1a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2m5.66 0H14a2 2 0 0 1 2 2v4.34"></path>
                            <polygon points="22 8.5 19 11.5 16 8.5 16 2.5 22 2.5 22 8.5"></polygon>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $inventoryMetrics['low_stock'] }}</h3>
                        <p>Low Stock Items</p>
                        <div class="metric-trend neutral">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            0.0%
                        </div>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon out-of-stock">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $inventoryMetrics['out_of_stock'] }}</h3>
                        <p>Out of Stock Items</p>
                        <div class="metric-trend negative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                <polyline points="17 18 23 18 23 12"></polyline>
                            </svg>
                            1.5%
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- Inventory Chart -->
        <div class="report-chart-container">
            <div class="chart-header">
                <h2>Inventory Levels Trend</h2>
                <div class="chart-controls">
                    <div class="chart-type-toggle">
                        <button class="chart-type-btn active" data-type="line">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            Line
                        </button>
                        <button class="chart-type-btn" data-type="bar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                            Bar
                        </button>
                    </div>
                    
                    <div class="chart-legend">
                        <div class="legend-item">
                            <span class="legend-color stock"></span>
                            <span>In Stock</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color low-stock"></span>
                            <span>Low Stock</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color out-of-stock"></span>
                            <span>Out of Stock</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chart-wrapper">
                <canvas id="inventoryChart" height="350"></canvas>
            </div>
        </div>
        
        <div class="report-details-grid">
            <!-- Low Stock Items -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Low Stock Items</h3>
                    <button class="btn-text">View All</button>
                </div>
                
                <div class="card-content">
                    <div class="low-stock-items">
                        @foreach($inventoryMetrics['low_stock_items'] as $item)
                            <div class="stock-item">
                                <div class="stock-info">
                                    <h4>{{ $item['name'] }}</h4>
                                    <div class="stock-stats">
                                        <span class="stock-count">{{ $item['current'] }} in stock</span>
                                        <span class="stock-threshold">Threshold: {{ $item['threshold'] }}</span>
                                    </div>
                                </div>
                                <div class="stock-progress">
                                    <div class="progress-bar {{ $item['current'] <= 2 ? 'danger' : 'warning' }}" style="width: {{ ($item['current'] / $item['threshold']) * 100 }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Inventory by Day -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Daily Inventory Status</h3>
                    <div class="card-actions">
                        <button class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                        <button class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="card-content">
                    <div class="inventory-by-day">
                        <table class="data-table compact">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>In Stock</th>
                                    <th>Low Stock</th>
                                    <th>Out of Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(array_slice($inventoryData, -7) as $day)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($day['date'])->format('D, M j') }}</td>
                                        <td>{{ $day['in_stock'] }}</td>
                                        <td>{{ $day['low_stock'] }}</td>
                                        <td>{{ $day['out_of_stock'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Category Breakdown -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Inventory by Category</h3>
                </div>
                <div class="card-content">
                    <div class="pie-chart-container">
                        <canvas id="categoryBreakdownChart" height="220"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Key Insights -->
           <div class="report-card">
                <div class="card-header">
                    <h3>Key Insights</h3>
                </div>
                <div class="card-content">
                    <div class="insights-list">
                        <div class="insight-item visible">
                            <div class="insight-icon positive">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Improved Turnover Rate</h4>
                                   <p>The inventory turnover rate has increased by 7.3% compared to the previous period, indicating more efficient inventory management.</p>

                            </div>
                        </div>
                        
                        <div class="insight-item visible">
                            <div class="insight-icon positive">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </div>
                            <div class="insight-content">
                              <h4>Stable Low Stock Levels</h4>
                    <p>Low stock items have remained consistent at around {{ $inventoryMetrics['low_stock'] }} items, with no significant change from the previous period.</p>

                            </div>
                        </div>
                        
                        <div class="insight-item visible">
                            <div class="insight-icon negative">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Main Warehouse Efficiency</h4>
                    <p>The main warehouse shows a 5.2% improvement in storage efficiency, with better space utilization and organization.</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Warehouse Distribution -->
        <div class="report-card">
            <div class="card-header">
                <h3>Warehouse Distribution</h3>
                <div class="card-actions">
                    <button class="btn-text">View Detailed Report</button>
                </div>
            </div>
            <div class="card-content">
                <div id="warehouseMapContainer" class="warehouse-map">
                    <!-- Map will be rendered here by JavaScript -->
                </div>
                <div class="warehouse-metrics">
                    <div class="warehouse-metric-item">
                        <div class="warehouse-name">Main Warehouse</div>
                        <div class="warehouse-stat">
                            <div class="stat-value">142</div>
                            <div class="stat-percentage positive">72%</div>
                        </div>
                    </div>
                    <div class="warehouse-metric-item">
                        <div class="warehouse-name">North Facility</div>
                        <div class="warehouse-stat">
                            <div class="stat-value">63</div>
                            <div class="stat-percentage positive">80%</div>
                        </div>
                    </div>
                    <div class="warehouse-metric-item">
                        <div class="warehouse-name">South Facility</div>
                        <div class="warehouse-stat">
                            <div class="stat-value">47</div>
                            <div class="stat-percentage negative">48%</div>
                        </div>
                    </div>
                    <div class="warehouse-metric-item">
                        <div class="warehouse-name">East Facility</div>
                        <div class="warehouse-stat">
                            <div class="stat-value">72</div>
                            <div class="stat-percentage positive">68%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart.js Integration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inventory Chart
            const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
            
            // Prepare data from PHP
            const inventoryData = @json($inventoryData);
            const labels = inventoryData.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            });
            const inStockData = inventoryData.map(item => item.in_stock);
            const lowStockData = inventoryData.map(item => item.low_stock);
            const outOfStockData = inventoryData.map(item => item.out_of_stock);
            
            // Calculate max values for scaling
            const maxItems = Math.max(...inStockData.map((val, i) => val + lowStockData[i] + outOfStockData[i])) * 1.2;
            
            // Initialize Inventory Chart
            let inventoryChart = new Chart(inventoryCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'In Stock',
                            data: inStockData,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#3b82f6',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3,
                            stack: 'stack1'
                        },
                        {
                            label: 'Low Stock',
                            data: lowStockData,
                            borderColor: '#f59e0b',
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#f59e0b',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3,
                            stack: 'stack1'
                        },
                        {
                            label: 'Out of Stock',
                            data: outOfStockData,
                            borderColor: '#ef4444',
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#ef4444',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3,
                            stack: 'stack1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            stacked: true,
                            max: maxItems,
                            grid: {
                                borderDash: [5, 5]
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    }
                }
            });
            
            // Chart type toggle functionality
            document.querySelectorAll('.chart-type-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const chartType = this.getAttribute('data-type');
                    document.querySelectorAll('.chart-type-btn').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');
                    
                    // Update chart type
                    inventoryChart.config.type = chartType;
                    inventoryChart.update();
                });
            });
            
            // Category Breakdown Pie Chart
            const categoryCtx = document.getElementById('categoryBreakdownChart').getContext('2d');
            
            const categoryData = [
                { category: 'Dry Goods', value: 78 },
                { category: 'Refrigerated', value: 54 },
                { category: 'Frozen', value: 32 },
                { category: 'Produce', value: 41 },
                { category: 'Non-Food', value: 25 }
            ];
            
            const categoryChart = new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: categoryData.map(item => item.category),
                    datasets: [{
                        data: categoryData.map(item => item.value),
                        backgroundColor: [
                            '#3b82f6', '#10b981', '#f59e0b', '#ef4444',
                            '#8b5cf6', '#ec4899', '#06b6d4', '#84cc16'
                        ],
                        borderWidth: 0,
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 15,
                                padding: 15
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} items (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    
    <!-- Custom Dashboard Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Export buttons functionality
            document.querySelector('button:contains("Export as PDF")').addEventListener('click', function() {
                alert('Exporting report as PDF...');
                // Implementation for PDF export would go here
            });
            
            document.querySelector('button:contains("Download CSV")').addEventListener('click', function() {
                window.location.href = '/exports/inventory-data.csv?period={{ $period }}';
            });
            
            document.querySelector('button:contains("Schedule Report")').addEventListener('click', function() {
                // Open modal for report scheduling
                $('#scheduleReportModal').modal('show');
            });
            
            // Add animated entrance for insights
            const insightItems = document.querySelectorAll('.insight-item');
            insightItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('visible');
                }, 100 * index);
            });
        });
        
        // Function to handle responsive adjustments
        function handleResponsiveLayout() {
            const viewportWidth = window.innerWidth;
            
            // Adjust chart size based on viewport
            if (viewportWidth < 768) {
                // Mobile layout adjustments
                document.querySelectorAll('.chart-wrapper').forEach(chart => {
                    chart.style.height = '250px';
                });
                
                // Simplify legend on mobile
                document.querySelectorAll('.chart-legend').forEach(legend => {
                    legend.classList.add('compact');
                });
            } else {
                // Desktop layout reset
                document.querySelectorAll('.chart-wrapper').forEach(chart => {
                    chart.style.height = '350px';
                });
                
                document.querySelectorAll('.chart-legend').forEach(legend => {
                    legend.classList.remove('compact');
                });
            }
            
            // Redraw charts to accommodate new sizes
            if (typeof inventoryChart !== 'undefined') {
                inventoryChart.resize();
            }
            
            if (typeof categoryChart !== 'undefined') {
                categoryChart.resize();
            }
        }
        
        // Initialize responsive handling
        window.addEventListener('resize', handleResponsiveLayout);
        handleResponsiveLayout();
        
        // Initialize table sorting
        if (document.querySelector('.data-table')) {
            setupTableSorting();
        }
        
        function setupTableSorting() {
            document.querySelectorAll('.data-table thead th').forEach(header => {
                header.addEventListener('click', function() {
                    const table = this.closest('table');
                    const rows = Array.from(table.querySelectorAll('tbody tr'));
                    const index = Array.from(this.parentNode.children).indexOf(this);
                    const isNumeric = !isNaN(parseFloat(rows[0].children[index].textContent));
                    const isAscending = this.classList.contains('sort-asc');
                    
                    // Remove sort classes from all headers
                    table.querySelectorAll('thead th').forEach(th => {
                        th.classList.remove('sort-asc', 'sort-desc');
                    });
                    
                    // Set new sort direction
                    this.classList.add(isAscending ? 'sort-desc' : 'sort-asc');
                    
                    // Sort rows
                    rows.sort((a, b) => {
                        let aValue = a.children[index].textContent.trim();
                        let bValue = b.children[index].textContent.trim();
                        
                        if (isNumeric) {
                            // Extract numeric value, handling currency symbols
                            aValue = parseFloat(aValue.replace(/[^0-9.-]+/g, ''));
                            bValue = parseFloat(bValue.replace(/[^0-9.-]+/g, ''));
                        }
                        
                        if (isAscending) {
                            return isNumeric ? aValue - bValue : aValue.localeCompare(bValue);
                        } else {
                            return isNumeric ? bValue - aValue : bValue.localeCompare(aValue);
                        }
                    });
                    
                    // Update table with sorted rows
                    const tbody = table.querySelector('tbody');
                    rows.forEach(row => tbody.appendChild(row));
                });
            });
        }
    </script>
    
    <!-- Schedule Report Modal -->
    <div class="modal" id="scheduleReportModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Schedule Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="scheduleReportForm">
                        <div class="form-group">
                            <label for="reportName">Report Name</label>
                            <input type="text" class="form-control" id="reportName" placeholder="Inventory Analysis Report" value="Inventory Analysis Report">
                        </div>
                        <div class="form-group">
                            <label for="frequency">Frequency</label>
                            <select class="form-control" id="frequency">
                                <option value="daily">Daily</option>
                                <option value="weekly" selected>Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dayOfWeek">Day of Week</label>
                            <select class="form-control" id="dayOfWeek">
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5" selected>Friday</option>
                                <option value="6">Saturday</option>
                                <option value="0">Sunday</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipients">Recipients</label>
                            <input type="text" class="form-control" id="recipients" placeholder="email@example.com">
                            <small class="form-text text-muted">Separate multiple emails with commas</small>
                        </div>
                        <div class="form-group">
                            <label for="format">Format</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formatPdf" checked>
                                <label class="form-check-label" for="formatPdf">PDF</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formatCsv">
                                <label class="form-check-label" for="formatCsv">CSV</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formatExcel">
                                <label class="form-check-label" for="formatExcel">Excel</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-primary" id="saveSchedule">Schedule Report</button>
                </div>
            </div>
        </div>
    </div>
    
                    
@endsection
                