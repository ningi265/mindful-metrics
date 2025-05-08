@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/customers-styles.css') }}">
    <!-- Additional CSS -->
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            Customer Insights Report
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

    <!-- Customer Report Content -->
    <div class="customer-report animate-fadeIn">
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
                    <div class="metric-icon total-customers">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $customerMetrics['total_customers'] }}</h3>
                        <p>Total Customers</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            {{ number_format($customerMetrics['growth_percentage'], 1) }}%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon new-customers">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $customerMetrics['new_customers'] }}</h3>
                        <p>New Customers</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            8.4%
                        </div>
                    </div>
                </div>
                 
                <div class="metric-card">
                    <div class="metric-icon customer-lifetime">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>${{ number_format($customerMetrics['avg_lifetime_value'], 2) }}</h3>
                        <p>Avg. Lifetime Value</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            5.2%
                        </div>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon retention-rate">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ number_format($customerMetrics['retention_rate'], 1) }}%</h3>
                        <p>Retention Rate</p>
                        <div class="metric-trend neutral">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            0.5%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Customer Growth Chart -->
        <div class="report-chart-container">
            <div class="chart-header">
                <h2>Customer Growth Trend</h2>
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
                            <span class="legend-color total"></span>
                            <span>Total Customers</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color new"></span>
                            <span>New Customers</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color returning"></span>
                            <span>Active Customers</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chart-wrapper">
                <canvas id="customerGrowthChart" height="350"></canvas>
            </div>
        </div>
        
        <div class="report-details-grid">
            <!-- Top Customers -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Top Customers</h3>
                    <button class="btn-text">View All</button>
                </div>
                
                <div class="card-content">
                    <div class="top-customers">
                        @foreach($customerMetrics['top_customers'] as $customer)
                            <div class="customer-item">
                                <div class="customer-info">
                                    <div class="customer-avatar">
                                        <span>{{ strtoupper(substr($customer['name'], 0, 2)) }}</span>
                                    </div>
                                    <div class="customer-details">
                                        <h4>{{ $customer['name'] }}</h4>
                                        <span class="customer-email">{{ $customer['email'] }}</span>
                                    </div>
                                </div>
                                <div class="customer-stats">
                                    <div class="stat">
                                        <span class="stat-label">Orders</span>
                                        <span class="stat-value">{{ $customer['orders'] }}</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-label">Spent</span>
                                        <span class="stat-value">${{ number_format($customer['total_spent'], 2) }}</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-label">Last Order</span>
                                        <span class="stat-value">{{ $customer['last_order'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Customer Activity -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Recent Activity</h3>
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
                    <div class="activity-timeline">
                        @foreach($customerMetrics['recent_activities'] as $activity)
                            <div class="activity-item visible">
                                <div class="activity-icon {{ $activity['type'] }}">
                                    @if($activity['type'] == 'purchase')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                    @elseif($activity['type'] == 'signup')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                    @elseif($activity['type'] == 'review')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                        </svg>
                                    @elseif($activity['type'] == 'return')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 14 4 9l5-5"></path>
                                            <path d="M4 9h16a6 6 0 0 1 0 12H11"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="activity-content">
                                    <p class="activity-text">{{ $activity['description'] }}</p>
                                    <span class="activity-time">{{ $activity['time'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Customer Segments -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Customer Segments</h3>
                </div>
                <div class="card-content">
                    <div class="pie-chart-container">
                        <canvas id="segmentChart" height="220"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Key Insights -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Customer Insights</h3>
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
                                <h4>Customer Growth Acceleration</h4>
                                <p>New customer acquisition rate has increased by 8.4% compared to the previous period, indicating successful marketing campaigns.</p>
                            </div>
                        </div>
                        
                        <div class="insight-item visible">
                            <div class="insight-icon positive">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 0C1.46 6.7 1.33 10.28 4 13l8 8 8-8c2.67-2.72 2.54-6.3.42-8.42z"></path>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Improved Customer Lifetime Value</h4>
                                <p>Average customer lifetime value has increased by 5.2%, showing better customer retention and spending patterns over time.</p>
                            </div>
                        </div>
                        
                        <div class="insight-item visible">
                            <div class="insight-icon neutral">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </div>
                            <div class="insight-content">
                                <h4>Stable Retention Rate</h4>
                                <p>Customer retention rate has remained relatively stable at {{ number_format($customerMetrics['retention_rate'], 1) }}%, with a slight increase of 0.5% from the previous period.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Satisfaction Metrics -->
        <div class="report-card">
            <div class="card-header">
                <h3>Customer Satisfaction</h3>
                <div class="card-actions">
                    <button class="btn-text">View Detailed Report</button>
                </div>
            </div>
            <div class="card-content">
                <div class="satisfaction-metrics">
                    <div class="satisfaction-overview">
                        <div class="satisfaction-score">
                            <div class="score-circle">
                                <svg viewBox="0 0 36 36">
                                    <path class="circle-bg"
                                        d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                        stroke="#eee"
                                        stroke-width="3"
                                        fill="none" />
                                    <path class="circle"
                                        d="M18 2.0845
                                        a 15.9155 15.9155 0 0 1 0 31.831
                                        a 15.9155 15.9155 0 0 1 0 -31.831"
                                        stroke="#10b981"
                                        stroke-width="3"
                                        fill="none"
                                        stroke-dasharray="{{ $customerMetrics['satisfaction_score'] * 100 / 5 }}, 100" />
                                </svg>
                                <div class="score-value">{{ number_format($customerMetrics['satisfaction_score'], 1) }}</div>
                            </div>
                            <div class="score-label">Overall Satisfaction</div>
                        </div>
                        <div class="satisfaction-breakdown">
                            <div class="breakdown-item">
                                <div class="breakdown-label">Product Quality</div>
                                <div class="breakdown-bar">
                                    <div class="progress-bar" style="width: 88%"></div>
                                </div>
                                <div class="breakdown-value">4.4/5</div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">Customer Service</div>
                                <div class="breakdown-bar">
                                    <div class="progress-bar" style="width: 94%"></div>
                                </div>
                                <div class="breakdown-value">4.7/5</div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">Delivery Speed</div>
                                <div class="breakdown-bar">
                                    <div class="progress-bar" style="width: 76%"></div>
                                </div>
                            </div>
                            <div class="breakdown-item">
                                <div class="breakdown-label">Value for Money</div>
                                <div class="breakdown-bar">
                                    <div class="progress-bar" style="width: 82%"></div>
                                </div>
                                <div class="breakdown-value">4.1/5</div>
                            </div>
                        </div>
                    </div>

                    <div class="satisfaction-reviews">
                        <h4>Recent Customer Feedback</h4>
                        <div class="reviews-list">
                            @foreach($customerMetrics['recent_reviews'] as $review)
                                <div class="review-item">
                                    <div class="review-header">
                                        <div class="reviewer-name">{{ $review['name'] }}</div>
                                        <div class="review-rating">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review['rating'])
                                                    <svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                    </svg>
                                                @else
                                                    <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="review-text">{{ $review['comment'] }}</div>
                                    <div class="review-date">{{ $review['date'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart.js Integration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Customer Growth Chart
            const customerCtx = document.getElementById('customerGrowthChart').getContext('2d');
            
            // Prepare data from PHP
            const customerData = @json($customerData);
            
            // Create default data if customerData is empty or undefined
            const defaultData = [];
            const today = new Date();
            for (let i = 0; i < 7; i++) {
                const date = new Date();
                date.setDate(today.getDate() - i);
                defaultData.unshift({
                    date: date.toISOString().split('T')[0],
                    total_customers: 100 + i * 5,
                    new_customers: 2 + Math.floor(Math.random() * 4),
                    active_customers: 80 + Math.floor(Math.random() * 10)
                });
            }
            
            const dataToUse = Array.isArray(customerData) && customerData.length > 0 ? customerData : defaultData;
            
            const labels = dataToUse.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            });
            
            // Map data from the controller's structure to what the chart needs
            const totalCustomersData = dataToUse.map(item => item.total_customers || 0);
            const newCustomersData = dataToUse.map(item => item.new_customers || 0);
            const returningCustomersData = dataToUse.map(item => item.active_customers || 0);
            
            // Initialize Customer Growth Chart
            let customerChart = new Chart(customerCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Total Customers',
                            data: totalCustomersData,
                            borderColor: '#8b5cf6',
                            backgroundColor: 'rgba(139, 92, 246, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#8b5cf6',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'New Customers',
                            data: newCustomersData,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Active Customers',
                            data: returningCustomersData,
                            borderColor: '#f59e0b',
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#f59e0b',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3
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
                    customerChart.config.type = chartType;
                    customerChart.update();
                });
            });
            
            // Customer Segments Pie Chart
            const segmentCtx = document.getElementById('segmentChart');
            
            if (segmentCtx) {
                const segmentData = [
                    { segment: 'New', value: {{ $customerMetrics['segment_new'] ?? 5 }} },
                    { segment: 'Occasional', value: {{ $customerMetrics['segment_occasional'] ?? 30 }} },
                    { segment: 'Regular', value: {{ $customerMetrics['segment_regular'] ?? 25 }} },
                    { segment: 'Loyal', value: {{ $customerMetrics['segment_loyal'] ?? 30 }} },
                    { segment: 'VIP', value: {{ $customerMetrics['segment_vip'] ?? 10 }} }
                ];
                
                const segmentChart = new Chart(segmentCtx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: segmentData.map(item => item.segment),
                        datasets: [{
                            data: segmentData.map(item => item.value),
                            backgroundColor: [
                                '#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#ef4444'
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
                                        return `${label}: ${value} customers (${percentage}%)`;
                                    }
                                }
                            }
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
            const exportPdfBtn = document.querySelector('button:contains("Export as PDF")');
            if (exportPdfBtn) {
                exportPdfBtn.addEventListener('click', function() {
                    alert('Exporting report as PDF...');
                    // Implementation for PDF export would go here
                });
            }
            
            const downloadCsvBtn = document.querySelector('button:contains("Download CSV")');
            if (downloadCsvBtn) {
                downloadCsvBtn.addEventListener('click', function() {
                    window.location.href = '/exports/customer-data.csv?period={{ $period }}';
                });
            }
            
            const scheduleReportBtn = document.querySelector('button:contains("Schedule Report")');
            if (scheduleReportBtn) {
                scheduleReportBtn.addEventListener('click', function() {
                    // Open modal for report scheduling
                    $('#scheduleReportModal').modal('show');
                });
            }
            
            // Safely add animations if elements exist
            function safelyAddAnimations() {
                // For jQuery selector compatibility
                // Custom 'contains' selector for vanilla JS
                if (!Element.prototype.matches) {
                    Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
                }
                
                Document.prototype.querySelector_contains = function(tag, text) {
                    const elements = this.querySelectorAll(tag);
                    return Array.prototype.filter.call(elements, function(element) {
                        return RegExp(text).test(element.textContent);
                    });
                };
                
                // Add any animations that might be needed
                // Items already have visible class in HTML now
            }
            
            // Initialize responsive layout handling
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
                    
                    // Stack satisfaction metrics on mobile
                    const satisfactionMetrics = document.querySelector('.satisfaction-metrics');
                    if (satisfactionMetrics) {
                        satisfactionMetrics.classList.add('stacked');
                    }
                } else {
                    // Desktop layout reset
                    document.querySelectorAll('.chart-wrapper').forEach(chart => {
                        chart.style.height = '350px';
                    });
                    
                    document.querySelectorAll('.chart-legend').forEach(legend => {
                        legend.classList.remove('compact');
                    });
                    
                    const satisfactionMetrics = document.querySelector('.satisfaction-metrics');
                    if (satisfactionMetrics) {
                        satisfactionMetrics.classList.remove('stacked');
                    }
                }
                
                // Redraw charts to accommodate new sizes
                if (typeof customerChart !== 'undefined') {
                    customerChart.resize();
                }
                
                if (typeof segmentChart !== 'undefined') {
                    segmentChart.resize();
                }
            }
            
            // Run the safe animations
            safelyAddAnimations();
            
            // Initialize responsive handling
            window.addEventListener('resize', handleResponsiveLayout);
            handleResponsiveLayout();
        });
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
                            <input type="text" class="form-control" id="reportName" placeholder="Customer Insights Report" value="Customer Insights Report">
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