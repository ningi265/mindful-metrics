// resources/js/components/modern-charts.js

export function initializeModernCharts() {
    // Set global Chart.js defaults for all charts
    Chart.defaults.font.family = getComputedStyle(document.body).getPropertyValue('--font-sans') || 
        'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
    Chart.defaults.font.size = 12;
    Chart.defaults.color = getComputedStyle(document.body).getPropertyValue('--secondary-text') || '#475569';
    Chart.defaults.elements.line.tension = 0.4;
    Chart.defaults.elements.line.borderWidth = 3;
    Chart.defaults.elements.point.radius = 4;
    Chart.defaults.elements.point.hoverRadius = 6;
    Chart.defaults.plugins.tooltip.enabled = false; // We'll use custom tooltips
    Chart.defaults.plugins.legend.display = false; // We'll create custom legends
    
    // Custom tooltip handler
    const customTooltip = {
        id: 'customTooltip',
        afterDraw(chart, args, options) {
            const { ctx } = chart;
            const { tooltip } = chart;
            
            if (tooltip.opacity === 0) {
                if (chart.canvas.nextElementSibling && chart.canvas.nextElementSibling.classList.contains('chart-custom-tooltip')) {
                    chart.canvas.nextElementSibling.remove();
                }
                return;
            }
            
            // Remove existing tooltip
            if (chart.canvas.nextElementSibling && chart.canvas.nextElementSibling.classList.contains('chart-custom-tooltip')) {
                chart.canvas.nextElementSibling.remove();
            }
            
            // Create tooltip element
            const tooltipEl = document.createElement('div');
            tooltipEl.classList.add('chart-custom-tooltip');
            
            // Add header
            const headerEl = document.createElement('div');
            headerEl.classList.add('chart-tooltip-header');
            headerEl.textContent = tooltip.title[0] || '';
            tooltipEl.appendChild(headerEl);
            
            // Add items
            tooltip.body.forEach((body, i) => {
                const colors = tooltip.labelColors[i];
                const item = document.createElement('div');
                item.classList.add('chart-tooltip-item');
                
                const colorBox = document.createElement('div');
                colorBox.classList.add('chart-tooltip-color');
                colorBox.style.backgroundColor = colors.backgroundColor;
                item.appendChild(colorBox);
                
                const label = document.createElement('div');
                label.classList.add('chart-tooltip-label');
                label.textContent = tooltip.dataPoints[i].dataset.label || '';
                item.appendChild(label);
                
                const value = document.createElement('div');
                value.classList.add('chart-tooltip-value');
                value.textContent = tooltip.dataPoints[i].formattedValue;
                item.appendChild(value);
                
                tooltipEl.appendChild(item);
            });
            
            // Position the tooltip
            const position = chart.canvas.getBoundingClientRect();
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            
            tooltipEl.style.position = 'absolute';
            tooltipEl.style.left = position.left + scrollLeft + tooltip.caretX + 'px';
            tooltipEl.style.top = position.top + scrollTop + tooltip.caretY + 'px';
            tooltipEl.style.transform = 'translate(-50%, -100%)';
            tooltipEl.style.pointerEvents = 'none';
            
            // Add to DOM
            chart.canvas.parentNode.appendChild(tooltipEl);
        }
    };
    
    // Initialize Orders Chart
    if (document.getElementById('ordersChart')) {
        initializeOrdersChart();
    }
    
    // Initialize Inventory Chart
    if (document.getElementById('inventoryChart')) {
        initializeInventoryChart();
    }
    
    // Time period selector functionality
    document.querySelectorAll('.time-select').forEach(select => {
        select.addEventListener('change', function() {
            const chartId = this.getAttribute('data-chart-id');
            if (chartId === 'ordersChart') {
                initializeOrdersChart(this.value);
            } else if (chartId === 'inventoryChart') {
                initializeInventoryChart(this.value);
            }
        });
    });
    
    // Orders Chart Initialization
    function initializeOrdersChart(timePeriod = 'Last 90 Days') {
        const chartContainer = document.getElementById('ordersChart');
        const loadingEl = chartContainer.querySelector('.chart-loading');
        
        if (loadingEl) {
            loadingEl.classList.remove('hidden');
        }
        
        // Clear existing chart if any
        chartContainer.innerHTML = '';
        const canvas = document.createElement('canvas');
        chartContainer.appendChild(canvas);
        
        // Simulate data loading
        setTimeout(() => {
            // Generate data based on time period
            let labels, data;
            
            switch(timePeriod) {
                case 'Last 7 Days':
                    labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    data = [5, 8, 12, 7, 9, 11, 13];
                    break;
                case 'Last 30 Days':
                    labels = Array.from({length: 30}, (_, i) => `Day ${i+1}`);
                    data = Array.from({length: 30}, () => Math.floor(Math.random() * 15) + 5);
                    break;
                default: // Last 90 Days
                    labels = Array.from({length: 12}, (_, i) => `Week ${i+1}`);
                    data = [8, 12, 9, 14, 16, 13, 11, 15, 18, 16, 14, 19];
            }
            
            // Create gradient fill
            const ctx = canvas.getContext('2d');
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)');
            gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');
            
            // Create chart
            const ordersChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Orders',
                        data: data,
                        borderColor: 'var(--chart-primary)',
                        backgroundColor: gradient,
                        pointBackgroundColor: 'var(--chart-primary)',
                        pointBorderColor: 'var(--card-bg)',
                        pointBorderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'var(--chart-grid)',
                                drawBorder: false
                            },
                            ticks: {
                                padding: 10,
                                callback: function(value) {
                                    return value + ' orders';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                padding: 10,
                                maxRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 7
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y + ' orders';
                                }
                            }
                        }
                    }
                },
                plugins: [customTooltip]
            });
            
            // Create custom legend
            createCustomLegend('ordersChart-legend', ordersChart);
            
            // Add insights
            const total = data.reduce((a, b) => a + b, 0);
            const avg = (total / data.length).toFixed(1);
            const max = Math.max(...data);
            const trend = data[data.length - 1] > data[0] ? 'up' : 'down';
            const trendPercent = Math.abs(Math.round((data[data.length - 1] - data[0]) / data[0] * 100));
            
            const insightsEl = document.getElementById('ordersChart-insights');
            if (insightsEl) {
                insightsEl.innerHTML = `
                    <div class="insight-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18"></path>
                            <path d="M18.4 8.64L13.5 13.5l-4.5-4.5L3.6 15.4"></path>
                        </svg>
                        <span>Total: <span class="insight-value">${total} orders</span></span>
                    </div>
                    <div class="insight-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 18L12 22L16 18"></path>
                            <path d="M12 2V22"></path>
                        </svg>
                        <span>Average: <span class="insight-value">${avg} per day</span></span>
                    </div>
                    <div class="insight-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        <span>Trend: <span class="insight-value insight-${trend === 'up' ? 'positive' : 'negative'}">${trendPercent}% ${trend}</span></span>
                    </div>
                `;
            }
            
            // Hide loading indicator
            if (loadingEl) {
                loadingEl.classList.add('hidden');
            }
        }, 800); // Simulate loading delay
    }
    
    // Inventory Chart Initialization
    function initializeInventoryChart(timePeriod = 'Last 30 Days') {
        const chartContainer = document.getElementById('inventoryChart');
        const loadingEl = chartContainer.querySelector('.chart-loading');
        
        if (loadingEl) {
            loadingEl.classList.remove('hidden');
        }
        
        // Clear existing chart if any
        chartContainer.innerHTML = '';
        const canvas = document.createElement('canvas');
        chartContainer.appendChild(canvas);
        
        // Simulate data loading
        setTimeout(() => {
            // Generate data based on time period
            let labels, stockData, thresholdData;
            
            switch(timePeriod) {
                case 'Last 7 Days':
                    labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    stockData = [45, 38, 32, 28, 22, 18, 15];
                    thresholdData = Array(7).fill(25);
                    break;
                case 'Last 30 Days':
                    labels = Array.from({length: 10}, (_, i) => `Week ${i+1}`);
                    stockData = [50, 45, 38, 32, 28, 22, 18, 15, 12, 8];
                    thresholdData = Array(10).fill(25);
                    break;
                default: // Last 90 Days
                    labels = Array.from({length: 12}, (_, i) => `Month ${i+1}`);
                    stockData = [80, 75, 68, 62, 58, 52, 48, 42, 38, 32, 28, 22];
                    thresholdData = Array(12).fill(25);
            }
            
            // Create gradient fill
            const ctx = canvas.getContext('2d');
            const gradient1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradient1.addColorStop(0, 'rgba(16, 185, 129, 0.5)');
            gradient1.addColorStop(1, 'rgba(16, 185, 129, 0.0)');
            
            const gradient2 = ctx.createLinearGradient(0, 0, 0, 300);
            gradient2.addColorStop(0, 'rgba(239, 68, 68, 0.2)');
            gradient2.addColorStop(1, 'rgba(239, 68, 68, 0.0)');
            
            // Create chart
            const inventoryChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Stock Level',
                            data: stockData,
                            borderColor: 'var(--chart-secondary)',
                            backgroundColor: gradient1,
                            pointBackgroundColor: 'var(--chart-secondary)',
                            pointBorderColor: 'var(--card-bg)',
                            pointBorderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            order: 1
                        },
                        {
                            label: 'Threshold',
                            data: thresholdData,
                            borderColor: 'var(--chart-negative)',
                            borderDash: [5, 5],
                            backgroundColor: gradient2,
                            pointRadius: 0,
                            pointHoverRadius: 0,
                            fill: false,
                            tension: 0,
                            order: 2
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
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'var(--chart-grid)',
                                drawBorder: false
                            },
                            ticks: {
                                padding: 10,
                                callback: function(value) {
                                    return value + ' units';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                padding: 10,
                                maxRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 7
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    if (context.dataset.label === 'Stock Level') {
                                        return context.dataset.label + ': ' + context.parsed.y + ' units';
                                    } else {
                                        return context.dataset.label + ': ' + context.parsed.y + ' units';
                                    }
                                }
                            }
                        }
                    }
                },
                plugins: [customTooltip]
            });
            
            // Create custom legend
            createCustomLegend('inventoryChart-legend', inventoryChart);
            
            // Add insights
            const currentStock = stockData[stockData.length - 1];
            const initialStock = stockData[0];
            const belowThreshold = currentStock < thresholdData[0];
            const daysToThreshold = belowThreshold ? 0 : 
                Math.round((currentStock - thresholdData[0]) / ((initialStock - currentStock) / stockData.length));
            
            const insightsEl = document.getElementById('inventoryChart-insights');
            if (insightsEl) {
                insightsEl.innerHTML = `
                    <div class="insight-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 12V8H6a2 2 0 0 1-2-2c0-1.1.9-2 2-2h12v4"></path>
                            <path d="M4 6v12c0 1.1.9 2 2 2h14v-4"></path>
                            <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                        </svg>
                        <span>Current: <span class="insight-value">${currentStock} units</span></span>
                    </div>
                    <div class="insight-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="M12 6v6l4 2"></path>
                        </svg>
                        <span>Status: <span class="insight-value ${belowThreshold ? 'insight-negative' : 'insight-positive'}">${belowThreshold ? 'Below Threshold' : 'Adequate'}</span></span>
                    </div>
                    <div class="insight-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        <span>Forecast: <span class="insight-value">${belowThreshold ? 'Restock needed' : `${daysToThreshold} days until threshold`}</span></span>
                    </div>
                `;
            }
            
            // Hide loading indicator
            if (loadingEl) {
                loadingEl.classList.add('hidden');
            }
        }, 800); // Simulate loading delay
    }
    
    // Helper function to create custom interactive legends
    function createCustomLegend(legendId, chart) {
        const legendContainer = document.getElementById(legendId);
        if (!legendContainer) return;
        
        legendContainer.innerHTML = '';
        
        chart.data.datasets.forEach((dataset, i) => {
            if (dataset.label) {
                const legendItem = document.createElement('div');
                legendItem.classList.add('legend-item');
                legendItem.dataset.datasetIndex = i;
                
                const colorBox = document.createElement('div');
                colorBox.classList.add('legend-color');
                colorBox.style.backgroundColor = dataset.borderColor;
                legendItem.appendChild(colorBox);
                
                const text = document.createElement('span');
                text.textContent = dataset.label;
                legendItem.appendChild(text);
                
                // Toggle dataset visibility on click
                legendItem.addEventListener('click', () => {
                    const index = parseInt(legendItem.dataset.datasetIndex);
                    const meta = chart.getDatasetMeta(index);
                    
                    // Toggle visibility
                    meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                    
                    // Toggle active class
                    legendItem.classList.toggle('inactive', meta.hidden);
                    
                    chart.update();
                });
                
                legendContainer.appendChild(legendItem);
            }
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeModernCharts);