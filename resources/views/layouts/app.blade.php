<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/profile-styles.css') }}">
    <style>
        /* Base Variables */
        :root {
            --sidebar-width: 240px;
            --sidebar-collapsed-width: 80px;
            --header-height: 70px;
            --border-radius-sm: 8px;
            --border-radius-md: 12px;
            --border-radius-lg: 16px;
            --transition-speed: 0.3s;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.07), 0 1px 3px rgba(0,0,0,0.05);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            --font-sans: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        /* Light Theme */
        :root.light {
            --sidebar-bg: #1e293b;
            --sidebar-text: #f8fafc;
            --sidebar-hover: #334155;
            --sidebar-active: #334155;
            --sidebar-border: rgba(255,255,255,0.1);
            --sidebar-icon: #94a3b8;
            --sidebar-icon-active: #3b82f6;
            
            --content-bg: #f1f5f9;
            --card-bg: #ffffff;
            --header-bg: #ffffff;
            
            --border-color: #e2e8f0;
            --primary-text: #0f172a;
            --secondary-text: #475569;
            --muted-text: #94a3b8;
            
            --accent-blue: #3b82f6;
            --accent-blue-hover: #2563eb;
            --accent-blue-light: rgba(59, 130, 246, 0.1);
            --accent-green: #10b981;
            --accent-green-light: rgba(16, 185, 129, 0.1);
            --accent-amber: #f59e0b;
            --accent-amber-light: rgba(245, 158, 11, 0.1);
            --accent-red: #ef4444;
            --accent-red-light: rgba(239, 68, 68, 0.1);
            --accent-purple: #8b5cf6;
            --accent-purple-light: rgba(139, 92, 246, 0.1);
            
            --status-green-bg: #ecfdf5;
            --status-green-text: #10b981;
            --status-orange-bg: #fff7ed;
            --status-orange-text: #f97316;
            --status-red-bg: #fef2f2;
            --status-red-text: #ef4444;
            
            --chart-grid: #e2e8f0;
        }

        /* Dark Theme */
        :root.dark {
            --sidebar-bg: #0f172a;
            --sidebar-text: #f8fafc;
            --sidebar-hover: #1e293b;
            --sidebar-active: #1e293b;
            --sidebar-border: rgba(255,255,255,0.05);
            --sidebar-icon: #94a3b8;
            --sidebar-icon-active: #3b82f6;
            
            --content-bg: #1e293b;
            --card-bg: #0f172a;
            --header-bg: #0f172a;
            
            --border-color: #334155;
            --primary-text: #f8fafc;
            --secondary-text: #cbd5e1;
            --muted-text: #94a3b8;
            
            --accent-blue: #3b82f6;
            --accent-blue-hover: #2563eb;
            --accent-blue-light: rgba(59, 130, 246, 0.1);
            --accent-green: #10b981;
            --accent-green-light: rgba(16, 185, 129, 0.1);
            --accent-amber: #f59e0b;
            --accent-amber-light: rgba(245, 158, 11, 0.1);
            --accent-red: #ef4444;
            --accent-red-light: rgba(239, 68, 68, 0.1);
            --accent-purple: #8b5cf6;
            --accent-purple-light: rgba(139, 92, 246, 0.1);
            
            --status-green-bg: rgba(16, 185, 129, 0.1);
            --status-green-text: #10b981;
            --status-orange-bg: rgba(249, 115, 22, 0.1);
            --status-orange-text: #f97316;
            --status-red-bg: rgba(239, 68, 68, 0.1);
            --status-red-text: #ef4444;
            
            --chart-grid: #334155;
        }
        
        /* Base Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: var(--font-sans);
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            color: var(--primary-text);
            background-color: var(--content-bg);
            transition: background-color var(--transition-speed), color var(--transition-speed);
            overflow-x: hidden;
        }
        
        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--card-bg);
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            transition: all var(--transition-speed);
            border: 1px solid var(--border-color);
        }

        .theme-toggle:hover {
            background: var(--accent-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .theme-toggle:hover svg {
            stroke: white;
        }

        .theme-toggle svg {
            stroke: var(--primary-text);
            transition: all var(--transition-speed);
        }

        .light .moon-icon {
            display: none;
        }

        .dark .sun-icon {
            display: none;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-md);
            z-index: 10;
            transition: all var(--transition-speed);
            overflow-x: hidden;
        }
        
        .sidebar-collapsed .sidebar {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar-header {
            padding: 0 24px 0 60px;
            height: var(--header-height);
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--sidebar-border);
            position: relative;
        }
        
        .sidebar-header h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            white-space: nowrap;
            transition: opacity var(--transition-speed), transform var(--transition-speed);
        }
        
        .sidebar-collapsed .sidebar-header h2 {
            opacity: 0;
            transform: translateX(-20px);
        }
        
        .sidebar-toggle {
            position: absolute;
    left: 24px;
    top: 50%;
    transform: translateY(-50%);
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 11;
    transition: all var(--transition-speed);
    border-radius: 4px;
    padding: 5px;
        }
        
        .sidebar-toggle svg {
            width: 18px;
    height: 18px;
    stroke: var(--sidebar-text);
    stroke-width: 2.5px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0.8;
        }
        
        .sidebar-collapsed .sidebar-toggle svg {
            transform: rotate(180deg);
        }
        .sidebar-toggle:hover svg {
    stroke: var(--accent-blue);
    opacity: 1;
    transform: scale(1.1);
}
/* Active/pressed state */
.sidebar-toggle:active {
    transform: translateY(-50%) scale(0.92);
}

/* Add a subtle tooltip */
.sidebar-toggle::after {
    content: attr(data-tooltip);
    position: absolute;
    left: 110%;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    transform: translateX(-10px);
    transition: opacity 0.2s ease, transform 0.2s ease;
    pointer-events: none;
    z-index: 100;
}

.sidebar-toggle:hover {
    background-color: rgba(255, 255, 255, 0.1); /* Very subtle background on hover */
}

.main-content {
    width: calc(100vw - var(--sidebar-width));
    overflow-x: hidden;
}

.sidebar-collapsed .main-content {
    width: calc(100vw - var(--sidebar-collapsed-width));
}

.content {
    max-width: 100%;
    padding: 24px 24px 24px 28px; /* Adjust padding for collapsed state */
}

/* Prevent horizontal overflow */
body {
    overflow-x: hidden;
}

/* Optional: Ensure charts resize properly */
.chart-wrapper canvas {
    max-width: 100%;
    height: auto !important;
}
        
        .sidebar-menu {
            padding: 16px 0;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all var(--transition-speed);
            border-left: 3px solid transparent;
            margin: 2px 0;
            position: relative;
            white-space: nowrap;
        }
        
        .sidebar-menu a:hover {
            background: var(--sidebar-hover);
            border-left-color: var(--accent-blue);
        }
        
        .sidebar-menu a.active {
            background: var(--sidebar-active);
            border-left-color: var(--accent-blue);
            font-weight: 500;
        }
        
        .sidebar-menu a.active i svg {
            stroke: var(--sidebar-icon-active);
            opacity: 1;
        }

        .sidebar-menu a i {
            margin-right: 16px;
            width: 20px;
            text-align: center;
            transition: all var(--transition-speed);
        }
        
        .sidebar-collapsed .sidebar-menu a i {
            margin-right: 0;
        }

        .sidebar-menu a i svg {
            width: 20px;
            height: 20px;
            stroke: var(--sidebar-icon);
            opacity: 0.8;
            transition: all var(--transition-speed);
        }

        .sidebar-menu a:hover i svg {
            opacity: 1;
        }
        
        .sidebar-menu a span {
            transition: opacity var(--transition-speed);
        }
        
        .sidebar-collapsed .sidebar-menu a span {
            opacity: 0;
        }

        .sidebar-menu .menu-section {
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid var(--sidebar-border);
        }
        
        .sidebar-menu .menu-label {
            padding: 0 24px;
            margin: 16px 0 8px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted-text);
            transition: opacity var(--transition-speed);
        }
        
        .sidebar-collapsed .sidebar-menu .menu-label {
            opacity: 0;
        }

        .user-menu {
            padding: 16px 24px;
            margin-top: auto;
            display: flex;
            align-items: center;
            border-top: 1px solid var(--sidebar-border);
            transition: all var(--transition-speed);
        }
        
        .sidebar-collapsed .user-menu {
            padding: 16px 0;
            justify-content: center;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background-color: var(--accent-blue-light);
            color: var(--accent-blue);
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all var(--transition-speed);
            flex-shrink: 0;
        }
        
        .sidebar-collapsed .user-menu span {
            display: none;
        }
        
        .sidebar-collapsed .user-avatar {
            margin-right: 0;
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            position: relative;
            transition: margin-left var(--transition-speed);
        }
        
        .sidebar-collapsed .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        .content {
            padding: 24px;
            max-width: 1600px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding: 16px 24px;
            background: var(--header-bg);
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .page-header h1 svg {
            width: 24px;
            height: 24px;
            stroke: var(--accent-blue);
        }

        .page-header .date {
            color: var(--secondary-text);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .page-header .date svg {
            width: 16px;
            height: 16px;
            stroke: var(--secondary-text);
        }
        
        /* Dashboard Card Styles */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .charts-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .card {
            background: var(--card-bg);
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-sm);
            padding: 24px;
            border: 1px solid var(--border-color);
            transition: all var(--transition-speed);
            overflow: hidden;
        }
        
        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }
        
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 20px;
            color: var(--primary-text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-title svg {
            stroke: var(--accent-blue);
        }

        /* Stats Cards */
        .stats-card {
            position: relative;
            padding: 16px;
        }

        .stats-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stats-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--accent-blue-light);
            color: var(--accent-blue);
            transition: all var(--transition-speed);
        }
        
        .stats-card:hover .stats-icon {
            background: var(--accent-blue);
            color: white;
        }

        .stats-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 12px 0 6px;
            letter-spacing: -0.5px;
        }

        .stats-subtext {
            color: var(--secondary-text);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .trend-indicator {
            display: flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            gap: 4px;
        }
        
        .trend-up {
            background: var(--accent-green-light);
            color: var(--accent-green);
        }
        
        .trend-down {
            background: var(--accent-red-light);
            color: var(--accent-red);
        }
        
        .trend-neutral {
            background: var(--accent-blue-light);
            color: var(--accent-blue);
        }
        
        .trend-indicator svg {
            width: 14px;
            height: 14px;
        }

        /* Chart Styles */
        .chart-card {
            position: relative;
            padding: 0;
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .chart-title {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .chart-title svg {
            width: 18px;
            height: 18px;
            stroke: var(--accent-blue);
        }
        
        .chart-actions {
            display: flex;
            gap: 8px;
        }
        
        .chart-select {
            padding: 8px 12px;
            border-radius: var(--border-radius-sm);
            border: 1px solid var(--border-color);
            background: var(--card-bg);
            color: var(--primary-text);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all var(--transition-speed);
        }
        
        .chart-select:hover {
            border-color: var(--accent-blue);
        }

        .chart-container {
            height: 280px;
            padding: 24px;
            position: relative;
        }

        .chart-legend {
            display: flex;
            gap: 16px;
            padding: 0 24px 8px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            color: var(--secondary-text);
            gap: 6px;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
        }
        
        /* Popular Items */
        .popular-items {
            margin-top: 8px;
            padding: 0 8px;
        }
        
        .popular-item {
            padding: 12px 16px;
            margin-bottom: 8px;
            font-size: 0.95rem;
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            transition: all var(--transition-speed);
            gap: 16px;
        }

        .popular-item:hover {
            background-color: var(--content-bg);
            transform: translateX(4px);
        }
        
        .item-rank {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: var(--border-radius-sm);
            background-color: var(--content-bg);
            color: var(--secondary-text);
            font-size: 0.875rem;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .item-name {
            color: var(--primary-text);
            flex: 1;
            font-weight: 500;
        }
        
        .item-count {
            color: var(--accent-blue);
            font-weight: 600;
            font-size: 0.875rem;
            padding: 4px 10px;
            background: var(--accent-blue-light);
            border-radius: 20px;
        }
        
        /* Table Styles */
        .table-card {
            padding: 0;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table-title {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .table-title svg {
            width: 18px;
            height: 18px;
            stroke: var(--accent-blue);
        }
        
        .table-actions {
            display: flex;
            gap: 8px;
        }
        
        .btn-text {
            padding: 8px 16px;
            border-radius: var(--border-radius-sm);
            background: var(--accent-blue-light);
            color: var(--accent-blue);
            border: none;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-speed);
        }
        
        .btn-text:hover {
            background: var(--accent-blue);
            color: white;
        }
        
        .table-container {
            padding: 16px 24px 24px;
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
            border-bottom: 1px solid var(--border-color);
            background-color: var(--card-bg);
            position: sticky;
            top: 0;
        }
        
        .data-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            transition: all var(--transition-speed);
        }
        
        .data-table tr {
            transition: all var(--transition-speed);
        }
        
        .data-table tr:hover {
            background-color: var(--content-bg);
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all var(--transition-speed);
        }
        
        .status::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
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
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease forwards;
        }
        
        .animate-slideIn {
            animation: slideInRight 0.5s ease forwards;
        }
        
        .animate-scaleIn {
            animation: scaleIn 0.4s ease forwards;
        }

        /* Add this to your existing CSS */
@media (min-width: 768px) and (max-width: 1440px) {
    .grid-container {
        gap: 16px;
    }

    .stats-card {
        padding: 16px;
    }

    .stats-icon {
        width: 40px;
        height: 40px;
    }

    .stats-value {
        font-size: 1.5rem;
        margin: 10px 0 6px;
    }

    .stats-subtext {
        font-size: 0.8rem;
    }

    .card-title {
        font-size: 1rem;
        margin-bottom: 16px;
    }

    .trend-indicator {
        font-size: 0.7rem;
        padding: 3px 6px;
    }
}

/* Adjust the existing media query */
@media (max-width: 1280px) {
    .grid-container {
        grid-template-columns: repeat(4, 1fr); /* Keep 4 columns until lower breakpoint */
    }
}

/* Modify this existing breakpoint */
@media (max-width: 1024px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr);
    }
}
        
/* Responsive Styles */
@media (max-width: 1280px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Additional responsive tweaks */
@media (max-width: 1400px) {
    .grid-container {
        grid-template-columns: repeat(4, 1fr);
    }
}
@media (max-width: 1280px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr); 
    }
}
@media (max-width: 768px) {
    .grid-container, .charts-container {
        grid-template-columns: 1fr;
    }
}
@media (max-width: 768px) {
            :root {
                --sidebar-width: 0px;
                --sidebar-collapsed-width: 0px;
            }
            
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-collapsed .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-toggle {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: var(--card-bg);
                box-shadow: var(--shadow-md);
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                z-index: 100;
                border: 1px solid var(--border-color);
            }
            
            .mobile-menu-toggle svg {
                width: 24px;
                height: 24px;
                stroke: var(--primary-text);
            }
            
            .sidebar-toggle {
                display: none;
            }
            
            .grid-container, .charts-container {
                grid-template-columns: 1fr;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            
            .page-header .date {
                align-self: flex-start;
            }
            .sidebar-header {
        padding: 0 24px;
    }
        }
    </style>

</head>
<body class="sidebar-collapsed">
    <!-- Mobile Menu Toggle -->
    <div class="mobile-menu-toggle" id="mobile-menu-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </div>

    <!-- Dark Mode Toggle -->
    <div id="theme-toggle" class="theme-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sun-icon">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="moon-icon">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
           
            <div class="sidebar-toggle" id="sidebar-toggle">
            @include('components.icons.sidebar-toggle')
            </div>
            <h2>Mindful Metrics</h2>
        </div>
        <div class="sidebar-menu">
            <a href="/" class="active">
                <i class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                </i>
                <span>Dashboard</span>
            </a>
            <a href="/reports">
                <i class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </i>
                <span>Orders</span>
            </a>
            <a href="#">
                <i class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </i>
                <span>Recipes</span>
            </a>
            <a href="/reports/inventory">
                <i class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </i>
                <span>Inventory</span>
            </a>
            <a href="/reports/customers">
                <i class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                </i>
                <span>Customers</span>
            </a>
            <a href="/reports/products">
                <i class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </i>
                <span>Products</span>
            </a>
            
            <div class="menu-section">
                <div class="menu-label">Administration</div>
                <a href="/user-profile">
                    <i class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </i>
                    <span>Users</span>
                </a>
                <a href="#">
                    <i class="sidebar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </i>
                    <span>Settings</span>
                </a>
            </div>
            
            <div class="user-menu">
    <div class="user-avatar">
        {{ collect(explode(' ', Auth::user()->name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->join('') }}
    </div>
    <span>{{ Auth::user()->name }}</span>
</div>

        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content">
            
            @yield('page_header')
            @yield('content')
            @yield('styles')
        </div>
    </div>

    <!-- JavaScript for Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Theme Toggle
            const themeToggle = document.getElementById('theme-toggle');
            themeToggle.addEventListener('click', function() {
                document.documentElement.classList.toggle('dark');
                document.documentElement.classList.toggle('light');
                
                // Save theme preference
                const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', currentTheme);
            });
            
            // Load saved theme
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.documentElement.className = savedTheme;
            }
            
            // Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebar-toggle');
            sidebarToggle.addEventListener('click', function() {
                document.body.classList.toggle('sidebar-collapsed');
                
                // Save sidebar state
                const sidebarState = document.body.classList.contains('sidebar-collapsed') ? 'collapsed' : 'expanded';
                localStorage.setItem('sidebar', sidebarState);
            });
            
            // Load saved sidebar state
            const savedSidebar = localStorage.getItem('sidebar');
            if (savedSidebar) {
                if (savedSidebar === 'collapsed') {
                    document.body.classList.add('sidebar-collapsed');
                } else {
                    document.body.classList.remove('sidebar-collapsed');
                }
            }
            
            // Mobile Menu Toggle
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            mobileMenuToggle.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.toggle('mobile-open');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const sidebar = document.querySelector('.sidebar');
                const mobileToggle = document.getElementById('mobile-menu-toggle');
                
                if (sidebar.classList.contains('mobile-open') && 
                    !sidebar.contains(event.target) && 
                    event.target !== mobileToggle) {
                    sidebar.classList.remove('mobile-open');
                }
            });
            
            // Add animation classes to elements
            const animateElements = document.querySelectorAll('.card, .page-header');
            animateElements.forEach((element, index) => {
                element.style.setProperty('--animation-order', index);
                element.classList.add('animate-fadeIn');
            });
        });
        // Enhanced toggle animation
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    
    // Add hover effect
    sidebarToggle.addEventListener('mouseenter', function() {
        this.querySelector('svg').style.stroke = 'var(--accent-blue)';
    });
    
    sidebarToggle.addEventListener('mouseleave', function() {
        this.querySelector('svg').style.stroke = '';
    });
    
    // Add click animation
    sidebarToggle.addEventListener('click', function() {
        // Add a slight scale effect on click
        this.style.transform = 'translateY(-50%) scale(0.9)';
        setTimeout(() => {
            this.style.transform = 'translateY(-50%)';
        }, 150);
    });
});
    </script>
</body>
</html>