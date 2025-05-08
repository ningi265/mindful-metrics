<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard-styles.css') }}">
@endsection


@section('page_header')
<div class="page-header">
    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
        </svg>
        Dashboard Overview
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
@endsection
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