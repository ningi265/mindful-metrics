@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sales-styles.css') }}">
    <!-- Additional CSS -->

@endsection


@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="20" x2="12" y2="10"></line>
                <line x1="18" y1="20" x2="18" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="16"></line>
            </svg>
            Sales Performance Report
        </h1>
        <div class="date">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            Today: May 6, 2025
        </div>
    </div>

    <!-- Sales Report Content -->
    <div class="sales-report animate-fadeIn">
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
                    <div class="metric-icon revenue">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>K{{ number_format($salesMetrics['total_revenue'], 2) }}</h3>
                        <p>Total Revenue</p>
                        <div class="metric-trend {{ $salesMetrics['revenue_growth'] >= 0 ? 'positive' : 'negative' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                @if($salesMetrics['revenue_growth'] >= 0)
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                @else
                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                    <polyline points="17 18 23 18 23 12"></polyline>
                                @endif
                            </svg>
                            {{ number_format(abs($salesMetrics['revenue_growth']), 1) }}%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon orders">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $salesMetrics['total_orders'] }}</h3>
                        <p>Total Orders</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            12.5%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon average">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                            <path d="M12 6v2"></path>
                            <path d="M12 16v2"></path>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>K{{ number_format($salesMetrics['avg_order_value'], 2) }}</h3>
                        <p>Avg Order Value</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            8.2%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon conversion">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>5.7%</h3>
                        <p>Conversion Rate</p>
                        <div class="metric-trend negative">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                <polyline points="17 18 23 18 23 12"></polyline>
                            </svg>
                            2.1%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sales Chart -->
        <div class="report-chart-container">
            <div class="chart-header">
                <h2>Revenue & Orders Trend</h2>
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
                            <span class="legend-color revenue"></span>
                            <span>Revenue</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color orders"></span>
                            <span>Orders</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chart-wrapper">
                <canvas id="salesChart" height="350"></canvas>
            </div>
        </div>
        
        <div class="report-details-grid">
            <!-- Top Products -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Top Selling Products</h3>
                    <button class="btn-text">View All</button>
                </div>
                
                <div class="card-content">
                    <div class="top-products">
                        @foreach($salesMetrics['top_items'] as $item)
                            <div class="product-item">
                                <div class="product-info">
                                    <h4>{{ $item['name'] }}</h4>
                                    <div class="product-stats">
                                        <span class="product-count">{{ $item['count'] }} orders</span>
                                        <span class="product-percentage">{{ $item['percentage'] }}% of total</span>
                                    </div>
                                </div>
                                <div class="product-progress">
                                    <div class="progress-bar" style="width: {{ $item['percentage'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Sales by Day -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Sales by Day</h3>
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
                    <div class="sales-by-day">
                        <table class="data-table compact">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Orders</th>
                                    <th>Revenue</th>
                                    <th>Avg Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(array_slice($salesData, -7) as $day)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($day['date'])->format('D, M j') }}</td>
                                        <td>{{ $day['orders'] }}</td>
                                        <td>K{{ number_format($day['revenue'], 2) }}</td>
                                        <td>K{{ number_format($day['average_order'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Revenue Breakdown -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Revenue Breakdown</h3>
                </div>
                <div class="card-content">
                    <div class="pie-chart-container">
                        <canvas id="revenueBreakdownChart" height="220"></canvas>
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
                        <div class="insight-item">
                            <div class="insight-icon positive">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Increased Average Order Value</h4>
                                <p>The average order value has increased by 8.2% compared to the previous period, indicating successful upselling strategies.</p>
                            </div>
                        </div>
                        
                        <div class="insight-item">
                            <div class="insight-icon neutral">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Consistent Weekend Performance</h4>
                                <p>Weekend sales remain consistent with no significant fluctuations, suggesting stable customer shopping patterns.</p>
                            </div>
                        </div>
                        
                        <div class="insight-item">
                            <div class="insight-icon negative">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Declining Conversion Rate</h4>
                                <p>The conversion rate has decreased by 2.1%, suggesting a need to review the checkout process or special offers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Regional Sales Map -->
        <div class="report-map-container">
            <div class="card-header">
                <h3>Regional Sales Distribution</h3>
                <div class="card-actions">
                    <button class="btn-text">View Detailed Report</button>
                </div>
            </div>
            <div class="card-content">
                <div id="salesMapContainer" class="sales-map">
                    <!-- Map will be rendered here by JavaScript -->
                </div>
                <div class="region-metrics">
                    @foreach($regionalData as $region)
                        <div class="region-metric-item">
                            <div class="region-name">{{ $region['name'] }}</div>
                            <div class="region-stat">
                                <div class="stat-value">K{{ number_format($region['revenue'], 2) }}</div>
                                <div class="stat-trend {{ $region['growth'] >= 0 ? 'positive' : 'negative' }}">
                                    {{ number_format(abs($region['growth']), 1) }}%
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart.js Integration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            
            // Prepare data from PHP
            const salesData = @json($salesData);
            const labels = salesData.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            });
            const revenueData = salesData.map(item => item.revenue);
            const ordersData = salesData.map(item => item.orders);
            
            // Calculate max values for scaling
            const maxRevenue = Math.max(...revenueData) * 1.2;
            const maxOrders = Math.max(...ordersData) * 1.2;
            
            // Create gradient for revenue
            const revenueGradient = salesCtx.createLinearGradient(0, 0, 0, 400);
            revenueGradient.addColorStop(0, 'rgba(59, 130, 246, 0.4)');
            revenueGradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');
            
            // Create gradient for orders
            const ordersGradient = salesCtx.createLinearGradient(0, 0, 0, 400);
            ordersGradient.addColorStop(0, 'rgba(16, 185, 129, 0.4)');
            ordersGradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');
            
            // Initialize Sales Chart
            let salesChart = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Revenue',
                            data: revenueData,
                            borderColor: '#3b82f6',
                            backgroundColor: revenueGradient,
                            borderWidth: 2,
                            pointBackgroundColor: '#3b82f6',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Orders',
                            data: ordersData,
                            borderColor: '#10b981',
                            backgroundColor: ordersGradient,
                            borderWidth: 2,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3,
                            yAxisID: 'y1'
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
                            type: 'linear',
                            display: true,
                            position: 'left',
                            max: maxRevenue,
                            ticks: {
                                callback: function(value) {
                                    return 'K' + value.toFixed(2);
                                }
                            },
                            grid: {
                                borderDash: [5, 5]
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            max: maxOrders,
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.dataset.label === 'Revenue') {
                                        label += 'K' + context.parsed.y.toFixed(2);
                                    } else {
                                        label += context.parsed.y;
                                    }
                                    return label;
                                }
                            }
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
                    salesChart.config.type = chartType;
                    salesChart.update();
                });
            });
            
            // Revenue Breakdown Pie Chart
            const breakdownCtx = document.getElementById('revenueBreakdownChart').getContext('2d');
            const breakdownData = @json($revenueBreakdown);
            
            const breakdownChart = new Chart(breakdownCtx, {
                type: 'doughnut',
                data: {
                    labels: breakdownData.map(item => item.category),
                    datasets: [{
                        data: breakdownData.map(item => item.value),
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
                                    const value = 'K' + context.parsed.toFixed(2);
                                    const percentage = Math.round(context.parsed * 100 / context.dataset.data.reduce((a, b) => a + b, 0)) + '%';
                                    return `${label}: ${value} (${percentage})`;
                                }
                            }
                        }
                    }
                }
            });
            
            // Initialize Regional Sales Map
            if (document.getElementById('salesMapContainer')) {
                const regionalData = @json($regionalMapData);
                // Initialize map here using a mapping library like jVectorMap
                // This is a placeholder for the map initialization code
                $('#salesMapContainer').vectorMap({
                    map: 'world_mill',
                    series: {
                        regions: [{
                            values: regionalData,
                            scale: ['#C8EEFF', '#0071A4'],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    onRegionTipShow: function(e, el, code) {
                        if (regionalData[code]) {
                            el.html(el.html() + ': K' + regionalData[code].toFixed(2));
                        }
                    }
                });
            }
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
                window.location.href = '/exports/sales-data.csv?period={{ $period }}';
            });
            
            document.querySelector('button:contains("Schedule Report")').addEventListener('click', function() {
                // Open modal for report scheduling
                $('#scheduleReportModal').modal('show');
            });
            
            // Initialize date pickers, tooltips, etc.
            // This would integrate with any JavaScript libraries you're using
            
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
            if (typeof salesChart !== 'undefined') {
                salesChart.resize();
            }
            
            if (typeof breakdownChart !== 'undefined') {
                breakdownChart.resize();
            }
        }
        
        // Initialize responsive handling
        window.addEventListener('resize', handleResponsiveLayout);
        handleResponsiveLayout();
        
        // Data refresh functionality
        let lastRefreshTime = new Date();
        
        function updateRefreshTimeDisplay() {
            const refreshDisplay = document.getElementById('last-refresh-time');
            if (refreshDisplay) {
                const timeAgo = getTimeAgo(lastRefreshTime);
                refreshDisplay.textContent = `Last updated ${timeAgo}`;
            }
        }
        
        function getTimeAgo(date) {
            const seconds = Math.floor((new Date() - date) / 1000);
            
            if (seconds < 60) {
                return 'just now';
            } else if (seconds < 3600) {
                const minutes = Math.floor(seconds / 60);
                return `${minutes} minute${minutes > 1 ? 's' : ''} ago`;
            } else if (seconds < 86400) {
                const hours = Math.floor(seconds / 3600);
                return `${hours} hour${hours > 1 ? 's' : ''} ago`;
            } else {
                const days = Math.floor(seconds / 86400);
                return `${days} day${days > 1 ? 's' : ''} ago`;
            }
        }
        
        // Auto refresh timer
        setInterval(updateRefreshTimeDisplay, 60000);
        updateRefreshTimeDisplay();
        
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
                            <input type="text" class="form-control" id="reportName" placeholder="Sales Performance Report" value="Sales Performance Report">
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
    
    <!-- Refresh Indicator -->
    <div class="refresh-indicator">
        <span id="last-refresh-time">Last updated just now</span>
        <button class="btn-icon refresh-btn" title="Refresh Data">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M23 4v6h-6"></path>
                <path d="M1 20v-6h6"></path>
                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
            </svg>
        </button>
    </div>
@endsection

