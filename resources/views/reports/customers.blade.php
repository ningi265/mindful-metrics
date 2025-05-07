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
            Today: May 6, 2025
        </div>
    </div>

    <!-- Customer Report Content -->
    <div class="customers-report animate-fadeIn">
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
                            {{ $customerMetrics['new_customers_period'] }}%
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon active">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>{{ $customerMetrics['active_customers'] }}</h3>
                        <p>Active Customers</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            {{ number_format($customerMetrics['active_rate'], 1) }}%
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
                        <h3>{{ $customerMetrics['new_customers_period'] }}</h3>
                        <p>New Customers</p>
                        <div class="metric-trend neutral">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            {{ number_format($customerMetrics['avg_daily_new'], 1) }}/day
                        </div>
                    </div>
                </div>
                
                <div class="metric-card">
                    <div class="metric-icon retention">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="metric-content">
                        <h3>78.5%</h3>
                        <p>Retention Rate</p>
                        <div class="metric-trend positive">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            3.2%
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/reports-styles.css') }}">
    <!-- Additional CSS -->
<style>
    /* Dashboard Styles */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
    }
    
    .page-header h1 {
        display: flex;
        align-items: center;
        font-size: 1.75rem;
        margin: 0;
    }
    
    .page-header h1 svg {
        width: 24px;
        height: 24px;
        margin-right: 0.75rem;
    }
    
    .date {
        display: flex;
        align-items: center;
        font-size: 0.875rem;
        color: var(--text-muted);
    }
    
    .date svg {
        width: 18px;
        height: 18px;
        margin-right: 0.5rem;
    }
    
    .customers-report {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .report-header {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .report-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .period-selector {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .period-selector label {
        font-weight: 500;
        margin-bottom: 0;
    }
    
    .period-selector select {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        border: 1px solid var(--border-color);
        background-color: var(--bg-card);
    }
    
    .report-actions {
        display: flex;
        gap: 0.75rem;
    }
    
    .btn-outline, .btn-primary, .btn-text, .btn-icon {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .btn-outline {
        border: 1px solid var(--border-color);
        background-color: transparent;
    }
    
    .btn-outline:hover {
        background-color: var(--bg-hover);
    }
    
    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
    }
    
    .btn-primary:hover {
        background-color: var(--primary-color-dark);
    }
    
    .btn-text {
        background: none;
        border: none;
        color: var(--primary-color);
        padding: 0.25rem 0.5rem;
    }
    
    .btn-icon {
        padding: 0.35rem;
        background: none;
        border: 1px solid var(--border-color);
    }
    
    button svg {
        width: 18px;
        height: 18px;
    }
    
    .report-metrics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }
    
    .metric-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background-color: var(--bg-card);
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .metric-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    
    .metric-icon svg {
        width: 24px;
        height: 24px;
        color: white;
    }
    
    .metric-icon.total-customers {
        background-color: #3b82f6;
    }
    
    .metric-icon.active {
        background-color: #10b981;
    }
    
    .metric-icon.new-customers {
        background-color: #f59e0b;
    }
    
    .metric-icon.retention {
        background-color: #8b5cf6;
    }
    
    .metric-content {
        flex-grow: 1;
    }
    
    .metric-content h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0 0 0.25rem 0;
    }
    
    .metric-content p {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin: 0 0 0.5rem 0;
    }
    
    .metric-trend {
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.75rem;
        font-weight: 500;
        padding: 0.2rem 0.5rem;
        border-radius: 1rem;
    }
    
    .metric-trend svg {
        width: 14px;
        height: 14px;
    }
    
    .metric-trend.positive {
        background-color: rgba(16, 185, 129, 0.1);
        color: #10b981;
    }
    
    .metric-trend.negative {
        background-color: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }
    
    .metric-trend.neutral {
        background-color: rgba(107, 114, 128, 0.1);
        color: #6b7280;
    }
    
    .report-chart-container, .report-card, .report-map-container {
        background-color: var(--bg-card);
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    .chart-header, .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem;
        border-bottom: 1px solid var(--border-color);
    }
    
    .chart-header h2, .card-header h3 {
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
    }
    
    .chart-controls {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    
    .chart-type-toggle {
        display: flex;
        border-radius: 0.375rem;
        overflow: hidden;
        border: 1px solid var(--border-color);
    }
    
    .chart-type-btn {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 0.75rem;
        background-color: var(--bg-card);
        border: none;
        cursor: pointer;
    }
    
    .chart-type-btn.active {
        background-color: var(--primary-color);
        color: white;
    }
    
    .chart-type-btn.active svg {
        color: white;
    }
    
    .chart-legend {
        display: flex;
        gap: 1rem;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.875rem;
    }
    
    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
    
    .legend-color.total {
        background-color: #3b82f6;
    }
    
    .legend-color.new {
        background-color: #f59e0b;
    }
    
    .legend-color.active {
        background-color: #10b981;
    }
    
    .chart-wrapper {
        padding: 1.5rem;
        height: 350px;
    }
    
    .report-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .card-content {
        padding: 1.25rem;
    }
    
    .top-customers {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    
    .customer-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem;
        border-radius: 0.5rem;
        background-color: var(--bg-light);
        transition: all 0.2s ease;
    }
    
    .customer-item:hover {
        background-color: var(--bg-hover);
    }
    
    .customer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        flex-shrink: 0;
    }
    
    .customer-info {
        flex-grow: 1;
    }
    
    .customer-info h4 {
        font-size: 0.938rem;
        font-weight: 500;
        margin: 0 0 0.25rem 0;
    }
    
    .customer-stats {
        display: flex;
        gap: 1rem;
        font-size: 0.813rem;
        color: var(--text-muted);
    }
    
    .customer-value {
        margin-left: auto;
        font-weight: 600;
        color: var(--text-primary);
    }
    
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .data-table th, .data-table td {
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
    }
    
    .data-table th {
        font-weight: 500;
        color: var(--text-muted);
        cursor: pointer;
    }
    
    .data-table th:hover {
        color: var(--text-primary);
    }
    
    .data-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .data-table.compact th, .data-table.compact td {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
    
    .insights-list {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }
    
    .insight-item {
        display: flex;
        gap: 1rem;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    
    .insight-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .insight-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    
    .insight-icon svg {
        width: 20px;
        height: 20px;
        color: white;
    }
    
    .insight-icon.positive {
        background-color: #10b981;
    }
    
    .insight-icon.negative {
        background-color: #ef4444;
    }
    
    .insight-icon.neutral {
        background-color: #6b7280;
    }
    
    .insight-content {
        flex-grow: 1;
    }
    
    .insight-content h4 {
        font-size: 0.938rem;
        font-weight: 500;
        margin: 0 0 0.375rem 0;
    }
    
    .insight-content p {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin: 0;
        line-height: 1.5;
    }
    
    .pie-chart-container {
        height: 220px;
        display: flex;
        justify-content: center;
    }
    
    .segment-metrics {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1rem;
        margin-top: 1.25rem;
    }
    
    .segment-metric-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        padding: 1rem;
        background-color: var(--bg-light);
        border-radius: 0.375rem;
    }
    
    .segment-name {
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .segment-stat {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .stat-value {
        font-size: 1.125rem;
        font-weight: 600;
    }
    
    .stat-percentage {
        font-size: 0.75rem;
        font-weight: 500;
        padding: 0.125rem 0.375rem;
        border-radius: 1rem;
    }
    
    .refresh-indicator {
        position: fixed;
        bottom: 1.5rem;
        right: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 1rem;
        background-color: var(--bg-card);
        border-radius: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 100;
    }
    
    #last-refresh-time {
        font-size: 0.813rem;
        color: var(--text-muted);
    }
    
    .refresh-btn {
        background-color: var(--bg-light);
        border-radius: 50%;
        padding: 0.375rem;
        border: none;
    }
    
    .refresh-btn:hover {
        background-color: var(--bg-hover);
    }
    
    .refresh-btn svg {
        width: 16px;
        height: 16px;
    }
    
    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }
    
    .modal.show {
        display: flex;
    }
    
    .modal-dialog {
        width: 100%;
        max-width: 500px;
        margin: 1.75rem auto;
    }
    
    .modal-content {
        background-color: var(--bg-card);
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem;
        border-bottom: 1px solid var(--border-color);
    }
    
    .modal-title {
        font-size: 1.125rem;
        font-weight: 600;
        margin: 0;
    }
    
    .close {
        background: none;
        border: none;
        font-size: 1.5rem;
        line-height: 1;
        cursor: pointer;
        opacity: 0.5;
    }
    
    .close:hover {
        opacity: 1;
    }
    
    .modal-body {
        padding: 1.25rem;
    }
    
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        padding: 1.25rem;
        border-top: 1px solid var(--border-color);
    }
    
    .form-group {
        margin-bottom: 1.25rem;
    }
    
    .form-group:last-child {
        margin-bottom: 0;
    }
    
    label {
        display: block;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 0.938rem;
        border: 1px solid var(--border-color);
        border-radius: 0.375rem;
        background-color: var(--bg-light);
    }
    
    .form-text {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.813rem;
    }
    
    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }
    
    .form-check-input {
        margin: 0;
    }
    
    .form-check-label {
        margin: 0;
        font-weight: normal;
    }
    
    /* Animation */
    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .report-controls {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .report-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .chart-controls {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .chart-legend {
            width: 100%;
            justify-content: space-around;
        }
    }
    
    @media (max-width: 768px) {
        .report-metrics {
            grid-template-columns: 1fr;
        }
        
        .chart-wrapper {
            height: 250px;
        }
        
        .report-details-grid {
            grid-template-columns: 1fr;
        }
        
        .segment-metrics {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        }
    }
    
    /* Theme variables */
    :root {
        --bg-card: #ffffff;
        --bg-light: #f9fafb;
        --bg-muted: #f3f4f6;
        --bg-hover: #f3f4f6;
        --text-primary: #111827;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --primary-color: #3b82f6;
        --primary-color-dark: #2563eb;
    }
    
    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        :root {
            --bg-card: #1f2937;
            --bg-light: #111827;
            --bg-muted: #374151;
            --bg-hover: #374151;
            --text-primary: #f9fafb;
            --text-muted: #9ca3af;
            --border-color: #374151;
            --primary-color: #3b82f6;
            --primary-color-dark: #2563eb;
        }
        
        body {
            background-color: #111827;
            color: #f9fafb;
        }
    }