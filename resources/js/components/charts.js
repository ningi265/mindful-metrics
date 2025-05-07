// resources/js/components/charts.js
export function initializeCharts() {
    // Orders Chart
    if (document.getElementById('ordersChart')) {
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

        new Chart(ordersCtx, {
            type: 'line',
            data: ordersData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // ... rest of your chart options
            }
        });
    }

    // Inventory Chart
    if (document.getElementById('inventoryChart')) {
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

        new Chart(inventoryCtx, {
            type: 'line',
            data: inventoryData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // ... rest of your chart options
            }
        });
    }
}

// Initialize charts when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeCharts);