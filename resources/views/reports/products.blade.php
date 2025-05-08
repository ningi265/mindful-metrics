@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/products-styles.css') }}">
    <!-- Additional CSS -->
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg>
            Product Analytics Report
        </h1>
        <div class="date">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            Today: May 8, 2025
        </div>
    </div>

    <!-- Product Report Content -->
    <div class="product-report animate-fadeIn">
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
                    <div class="metric-icon total-products">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $productMetrics['total_products'] }}</h3>
                        <p>Total Products</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            {{ number_format($productMetrics['growth_percentage'], 1) }}%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon new-products">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $productMetrics['new_products'] }}</h3>
                        <p>New Products</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            4.2%
                        </div>
                    </div>
                </div>
                 
                <div class="metric-card">
                    <div class="metric-icon avg-rating">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ number_format($productMetrics['avg_rating'], 1) }}</h3>
                        <p>Avg. Product Rating</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            0.3
                        </div>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon conversion-rate">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ number_format($productMetrics['conversion_rate'], 1) }}%</h3>
                        <p>Conversion Rate</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            1.5%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Performance Chart -->
        <div class="report-chart-container">
            <div class="chart-header">
                <h2>Product Performance Trends</h2>
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
                            <span class="legend-color views"></span>
                            <span>Page Views</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color sales"></span>
                            <span>Total Sales</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color revenue"></span>
                            <span>Revenue</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chart-wrapper">
                <canvas id="productPerformanceChart" height="350"></canvas>
            </div>
        </div>
        
        <div class="report-details-grid">
            <!-- Top Products -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Top Performing Products</h3>
                    <button class="btn-text">View All</button>
                </div>
                
                <div class="card-content">
                    <div class="top-products">
                        @foreach($productMetrics['top_products'] as $product)
                            <div class="product-item">
                                <div class="product-info">
                                    <div class="product-thumbnail">
                                        @if(isset($product['image']))
                                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                                        @else
                                            <div class="product-placeholder">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product-details">
                                        <h4>{{ $product['name'] }}</h4>
                                        <span class="product-category">{{ $product['category'] }}</span>
                                    </div>
                                </div>
                                <div class="product-stats">
                                    <div class="stat">
                                        <span class="stat-label">Sales</span>
                                        <span class="stat-value">{{ $product['sales'] }}</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-label">Revenue</span>
                                        <span class="stat-value">${{ number_format($product['revenue'], 2) }}</span>
                                    </div>
                                    <div class="stat">
                                        <span class="stat-label">Rating</span>
                                        <span class="stat-value">{{ number_format($product['rating'], 1) }}</span>
                                    </div>
                                </div>
                                <div class="product-progress">
                                    <div class="progress-bar" style="width: {{ $product['performance_percentage'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Product Variants Performance -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Product Variants Performance</h3>
                    <div class="card-actions">
                        <button class="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="3" y1="15" x2="21" y2="15"></line>
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
                    <div class="variants-table-container">
                        <table class="data-table compact">
                            <thead>
                                <tr>
                                    <th>Variant</th>
                                    <th>Stock</th>
                                    <th>Sales</th>
                                    <th>Conversion</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productMetrics['product_variants'] as $variant)
                                    <tr>
                                        <td>
                                            <div class="variant-info">
                                                <span class="variant-color" style="background-color: {{ $variant['color_hex'] }}"></span>
                                                <span>{{ $variant['name'] }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $variant['stock'] }}</td>
                                        <td>{{ $variant['sales'] }}</td>
                                        <td>{{ number_format($variant['conversion_rate'], 1) }}%</td>
                                        <td>
                                            <span class="status-badge {{ $variant['status_class'] }}">
                                                {{ $variant['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Category Distribution -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Category Distribution</h3>
                </div>
                <div class="card-content">
                    <div class="pie-chart-container">
                        <canvas id="categoryChart" height="220"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Product Insights -->
            <div class="report-card">
                <div class="card-header">
                    <h3>Product Insights</h3>
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
                                <h4>High-Performance Categories</h4>
                                <p>The Appetizers category has shown a 12.5% increase in sales volume compared to the previous period, driven by the popularity of new menu items.</p>
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
                                <h4>Improved Conversion Rates</h4>
                                <p>Overall product conversion rate has increased by 1.5% due to enhanced product descriptions and improved product photography.</p>
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
                                <h4>Underperforming Variants</h4>
                                <p>The Seafood Platter variant is showing a 5.8% decrease in sales. Consider adjusting pricing or refreshing the presentation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Reviews Analysis -->
        <div class="report-card">
            <div class="card-header">
                <h3>Product Reviews Analysis</h3>
                <div class="card-actions">
                    <button class="btn-text">View Detailed Report</button>
                </div>
            </div>
            <div class="card-content">
                <div class="reviews-analysis">
                    <div class="ratings-overview">
                        <div class="rating-score">
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
                                        stroke="#f59e0b"
                                        stroke-width="3"
                                        fill="none"
                                        stroke-dasharray="{{ $productMetrics['avg_rating'] * 100 / 5 }}, 100" />
                                </svg>
                                <div class="score-value">{{ $productMetrics['avg_rating'] }}</div>
                            </div>
                            <div class="score-label">Overall Rating</div>
                        </div>
                        <div class="ratings-breakdown">
                            @foreach($productMetrics['ratings_distribution'] as $rating => $percentage)
                                <div class="rating-item">
                                    <div class="stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $rating)
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
                                    <div class="rating-bar">
                                        <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <div class="rating-percentage">{{ $percentage }}%</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="feedback-topics">
                        <h4>Common Feedback Topics</h4>
                        <div class="topics-list">
                            @foreach($productMetrics['feedback_topics'] as $topic)
                                <div class="topic-item">
                                    <div class="topic-name">{{ $topic['name'] }}</div>
                                    <div class="topic-bar">
                                        <div class="progress-bar {{ $topic['sentiment'] }}" style="width: {{ $topic['percentage'] }}%"></div>
                                    </div>
                                    <div class="topic-percentage">{{ $topic['percentage'] }}%</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Recommendations -->
        <div class="report-card">
            <div class="card-header">
                <h3>Recommendations</h3>
            </div>
            <div class="card-content">
                <div class="recommendations-grid">
                    <div class="recommendation-item">
                        <div class="recommendation-icon optimize">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div class="recommendation-content">
                            <h4>Optimize Product Pricing</h4>
                            <p>Consider adjusting prices for Seafood Platter and other underperforming items.</p>
                            <button class="btn-text">View Strategy</button>
                        </div>
                    </div>
                    
                    <div class="recommendation-item">
                        <div class="recommendation-icon expand">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        </div>
                        <div class="recommendation-content">
                            <h4>Expand Appetizers Lineup</h4>
                            <p>Based on category performance, consider adding 2-3 new appetizer options.</p>
                            <button class="btn-text">Explore Ideas</button>
                        </div>
                    </div>
                    
                    <div class="recommendation-item">
                        <div class="recommendation-icon restock">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                        </div>
                        <div class="recommendation-content">
                            <h4>Restock Popular Variants</h4>
                            <p>Increase inventory levels for Red and Blue color variants to prevent stockouts.</p>
                            <button class="btn-text">View Inventory</button>
                        </div>
                    </div>
                    
                    <div class="recommendation-item">
                        <div class="recommendation-icon improve">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="recommendation-content">
                            <h4>Improve Product Descriptions</h4>
                            <p>Enhance descriptions for products with lower conversion rates to increase sales.</p>
                            <button class="btn-text">View Guidelines</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Chart.js Integration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Product Performance Chart
            const productCtx = document.getElementById('productPerformanceChart').getContext('2d');
            
            // Prepare data from PHP
            const productData = @json($productData);
            
            // Create default data if productData is empty or undefined
            const defaultData = [];
            const today = new Date();
            for (let i = 0; i < 7; i++) {
                const date = new Date();
                date.setDate(today.getDate() - i);
                defaultData.unshift({
                    date: date.toISOString().split('T')[0],
                    views: 100 + Math.floor(Math.random() * 50),
                    sales: 20 + Math.floor(Math.random() * 15),
                    revenue: 500 + Math.floor(Math.random() * 300)
                });
            }
            
            const dataToUse = Array.isArray(productData) && productData.length > 0 ? productData : defaultData;
            
            const labels = dataToUse.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            });
            
            // Map data from the controller's structure
            const viewsData = dataToUse.map(item => item.views || 0);
            const salesData = dataToUse.map(item => item.sales || 0);
            const revenueData = dataToUse.map(item => item.revenue || 0);
            
            // Initialize Product Performance Chart
            let productChart = new Chart(productCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Page Views',
                            data: viewsData,
                            borderColor: '#8b5cf6',
                            backgroundColor: 'rgba(139, 92, 246, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#8b5cf6',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            yAxisID: 'y',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Sales',
                            data: salesData,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            yAxisID: 'y',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'Revenue',
                            data: revenueData,
                            borderColor: '#f59e0b',
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: '#f59e0b',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            yAxisID: 'y1',
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
                            type: 'linear',
                            display: true,
                            position: 'left',
                            grid: {
                                borderDash: [5, 5]
                            },
                            title: {
                                display: true,
                                text: 'Views & Sales'
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Revenue ($)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.dataset.yAxisID === 'y1') {
                                        label += '$' + context.parsed.y.toFixed(2);
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
                    productChart.config.type = chartType;
                    productChart.update();
                });
            });
            
            // Category Distribution Pie Chart
            const categoryCtx = document.getElementById('categoryChart');
            
            if (categoryCtx) {
                const categoryData = @json($productMetrics['category_distribution']);
                
                const categoryChart = new Chart(categoryCtx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: categoryData.map(item => item.category),
                        datasets: [{
                            data: categoryData.map(item => item.value),
                            backgroundColor: [
                                '#10b981', // Green
                                '#3b82f6', // Blue
                                '#8b5cf6', // Purple
                                '#f59e0b', // Orange
                                '#ef4444'  // Red
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
                                        return `${label}: ${value} products (${percentage}%)`;
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
                    window.location.href = '/exports/product-data.csv?period={{ $period }}';
                });
            }
            
            const scheduleReportBtn = document.querySelector('button:contains("Schedule Report")');
            if (scheduleReportBtn) {
                scheduleReportBtn.addEventListener('click', function() {
                    // Open modal for report scheduling
                    $('#scheduleReportModal').modal('show');
                });
            }
            
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
                    
                    // Stack reviews analysis on mobile
                    const reviewsAnalysis = document.querySelector('.reviews-analysis');
                    if (reviewsAnalysis) {
                        reviewsAnalysis.classList.add('stacked');
                    }
                    
                    // Make recommendation grid single column
                    const recommendationsGrid = document.querySelector('.recommendations-grid');
                    if (recommendationsGrid) {
                        recommendationsGrid.classList.add('stacked');
                    }
                } else {
                    // Desktop layout reset
                    document.querySelectorAll('.chart-wrapper').forEach(chart => {
                        chart.style.height = '350px';
                    });
                    
                    document.querySelectorAll('.chart-legend').forEach(legend => {
                        legend.classList.remove('compact');
                    });
                    
                    const reviewsAnalysis = document.querySelector('.reviews-analysis');
                    if (reviewsAnalysis) {
                        reviewsAnalysis.classList.remove('stacked');
                    }
                    
                    const recommendationsGrid = document.querySelector('.recommendations-grid');
                    if (recommendationsGrid) {
                        recommendationsGrid.classList.remove('stacked');
                    }
                }
                
                // Redraw charts to accommodate new sizes
                if (typeof productChart !== 'undefined' && productChart.resize) {
                    productChart.resize();
                }
                
                if (typeof categoryChart !== 'undefined' && categoryChart.resize) {
                    categoryChart.resize();
                }
            }
            
            // Initialize responsive handling
            window.addEventListener('resize', handleResponsiveLayout);
            handleResponsiveLayout();
        });
    </script>
    
    <script>
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
                            <input type="text" class="form-control" id="reportName" placeholder="Product Analytics Report" value="Product Analytics Report">
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