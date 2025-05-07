@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/reports-styles.css') }}">
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            Reports Dashboard
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

    <!-- Reports Dashboard Content -->
    <div class="reports-dashboard animate-fadeIn">
        <!-- Reports Overview -->
        <div class="reports-overview">
            <div class="report-stats-card">
                <div class="report-stat">
                    <div class="report-stat-icon total">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <div class="report-stat-content">
                        <h3>{{ $reports['total_reports'] }}</h3>
                        <p>Total Reports</p>
                    </div>
                </div>
                <div class="report-stat">
                    <div class="report-stat-icon recent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="report-stat-content">
                        <h3>{{ $reports['recent_reports'] }}</h3>
                        <p>Recent Reports</p>
                    </div>
                </div>
                <div class="report-stat">
                    <div class="report-stat-icon favorites">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="report-stat-content">
                        <h3>{{ $reports['favorite_reports'] }}</h3>
                        <p>Favorites</p>
                    </div>
                </div>
                <div class="report-stat">
                    <div class="report-stat-icon shared">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                    </div>
                    <div class="report-stat-content">
                        <h3>{{ $reports['shared_reports'] }}</h3>
                        <p>Shared</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Report Categories -->
        <div class="report-categories">
            <h2 class="section-title">Report Categories</h2>
            <div class="categories-grid">
                <a href="{{ route('reports.sales') }}" class="category-card sales animate-hover">
                    <div class="category-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="20" x2="12" y2="10"></line>
                            <line x1="18" y1="20" x2="18" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="16"></line>
                        </svg>
                    </div>
                    <div class="category-content">
                        <h3>Sales Performance</h3>
                        <p>Track revenue, orders, and top selling items</p>
                    </div>
                    <div class="category-action">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
                
                <a href="{{ route('reports.inventory') }}" class="category-card inventory animate-hover">
                    <div class="category-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="category-content">
                        <h3>Inventory Analysis</h3>
                        <p>Monitor stock levels and inventory turnover</p>
                    </div>
                    <div class="category-action">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
                
                <a href="{{ route('reports.customers') }}" class="category-card customers animate-hover">
                    <div class="category-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="category-content">
                        <h3>Customer Insights</h3>
                        <p>Analyze customer behavior and retention</p>
                    </div>
                    <div class="category-action">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
                
                <a href="#" class="category-card products animate-hover">
                    <div class="category-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <div class="category-content">
                        <h3>Product Analytics</h3>
                        <p>Review product performance and popularity</p>
                    </div>
                    <div class="category-action">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
        
        <!-- Recent Reports -->
        <div class="recent-reports">
            <div class="section-header">
                <h2 class="section-title">Recent Reports</h2>
                <div class="section-actions">
                    <button class="btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        Export All
                    </button>
                    
                    <button class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        New Report
                    </button>
                </div>
            </div>
            
            <div class="reports-table-container">
                <table class="reports-table">
                    <thead>
                        <tr>
                            <th>Report Name</th>
                            <th>Type</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentReports as $report)
                            <tr class="report-row">
                                <td>
                                    <div class="report-info">
                                        <div class="report-thumbnail {{ $report['thumbnail'] }}">
                                            @if ($report['thumbnail'] === 'graph-bar')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="20" x2="18" y2="10"></line>
                                                    <line x1="12" y1="20" x2="12" y2="4"></line>
                                                    <line x1="6" y1="20" x2="6" y2="14"></line>
                                                </svg>
                                            @elseif ($report['thumbnail'] === 'box')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                                </svg>
                                            @elseif ($report['thumbnail'] === 'users')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                            @elseif ($report['thumbnail'] === 'trending-up')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                    <polyline points="17 6 23 6 23 12"></polyline>
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="report-name">{{ $report['name'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $report['type'] }}</td>
                                <td>{{ $report['created_at']->diffForHumans() }}</td>
                                <td>
                                    <div class="report-actions">
                                        <button class="action-btn view">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </button>
                                        
                                        <button class="action-btn download">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                <line x1="12" y1="15" x2="12" y2="3"></line>
                                            </svg>
                                        </button>
                                        
                                        <button class="action-btn favorite">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                            </svg>
                                        </button>
                                        
                                        <button class="action-btn favorite">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                            </svg>
                                        </button>
                                        
                                        <button class="action-btn more">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="pagination">
                <button class="pagination-btn prev disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    Previous
                </button>
                
                <div class="pagination-info">
                    Showing <span>1-4</span> of <span>4</span>
                </div>
                
                <button class="pagination-btn next disabled">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Report Templates -->
        <div class="report-templates">
            <h2 class="section-title">Report Templates</h2>
            <div class="templates-grid">
                <div class="template-card">
                    <div class="template-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                    <h3>Sales Summary</h3>
                    <p>Daily, weekly, or monthly sales performance overview</p>
                    <button class="btn-text">Use Template</button>
                </div>
                
                <div class="template-card">
                    <div class="template-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                    <h3>Inventory Status</h3>
                    <p>Current stock levels and low inventory alerts</p>
                    <button class="btn-text">Use Template</button>
                </div>
                
                <div class="template-card">
                    <div class="template-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18"></path>
                            <path d="M18.4 8.64L13.5 13.5l-4.5-4.5L3.6 15.4"></path>
                        </svg>
                    </div>
                    <h3>Performance Trends</h3>
                    <p>Comparative analysis of sales and inventory over time</p>
                    <button class="btn-text">Use Template</button>
                </div>
                
                <div class="template-card">
                    <div class="template-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                    <h3>Customer Satisfaction</h3>
                    <p>Feedback analysis and satisfaction metrics</p>
                    <button class="btn-text">Use Template</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Page Transitions JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add page transition animations
            const categoryCards = document.querySelectorAll('.category-card');
            
            categoryCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    // Only do the animation if it's a real link (not "#")
                    if (this.getAttribute('href') !== '#') {
                        e.preventDefault();
                        
                        // Add exit animation
                        document.querySelector('.reports-dashboard').classList.add('page-exit');
                        
                        // Navigate after animation completes
                        setTimeout(() => {
                            window.location.href = this.getAttribute('href');
                        }, 400);
                    }
                });
            });
            
            // Add entrance animation
            document.querySelector('.reports-dashboard').classList.add('page-enter');
            
            // Animate report rows on scroll
            const reportRows = document.querySelectorAll('.report-row');
            
            function checkScroll() {
                reportRows.forEach((row, index) => {
                    const rowTop = row.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (rowTop < windowHeight) {
                        // Add animation with staggered delay
                        setTimeout(() => {
                            row.classList.add('row-visible');
                        }, index * 100);
                    }
                });
            }
            
            // Run once on load
            checkScroll();
            
            // Add scroll event listener
            window.addEventListener('scroll', checkScroll);
        });
    </script>
@endsection