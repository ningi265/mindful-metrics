<!-- resources/views/components/sidebar.blade.php -->
@props([
    'collapsed' => false,
    'mobileOpen' => false,
    'logoUrl' => '/dashboard',
    'logoImage' => '/images/logo.svg',
    'logoText' => 'Dashboard',
    'pageTitle' => 'Dashboard'
])

<div 
    x-data="{ 
        collapsed: {{ $collapsed ? 'true' : 'false' }}, 
        mobileOpen: {{ $mobileOpen ? 'true' : 'false' }},
        toggleSidebar() { 
            this.collapsed = !this.collapsed; 
            this.saveSidebarState();
            // Close mobile if collapsing
            if (this.collapsed && this.mobileOpen) {
                this.mobileOpen = false;
            }
        },
        toggleMobile() { this.mobileOpen = !this.mobileOpen; },
        saveSidebarState() {
            localStorage.setItem('sidebar_collapsed', this.collapsed);
        },
        init() {
            // Restore state from localStorage
            const savedState = localStorage.getItem('sidebar_collapsed');
            if (savedState !== null) {
                this.collapsed = savedState === 'true';
            }
            
            // Auto-collapse on mobile by default
            if (window.innerWidth < 768) {
                this.collapsed = false;
                this.mobileOpen = false;
            }
            
            // Close sidebar when clicking outside
            document.addEventListener('click', (e) => {
                if (this.mobileOpen && !this.$el.contains(e.target) {
                    this.mobileOpen = false;
                }
            });
            
            // Close on route change
            Livewire.on('routeChanged', () => {
                this.mobileOpen = false;
            });
            
            // Keyboard shortcuts
            window.addEventListener('keydown', (e) => {
                // Cmd+B or Ctrl+B to toggle
                if ((e.metaKey || e.ctrlKey) && e.key === 'b') {
                    e.preventDefault();
                    this.toggleSidebar();
                }
                // Escape to close mobile
                if (e.key === 'Escape' && this.mobileOpen) {
                    this.mobileOpen = false;
                }
            });
            
            // Responsive behavior
            const handleResize = () => {
                if (window.innerWidth >= 768 && !this.mobileOpen) {
                    this.mobileOpen = false;
                }
            };
            
            window.addEventListener('resize', handleResize);
        }
    }"
    class="sidebar-wrapper"
>
    <!-- Mobile Overlay -->
    <div 
        x-show="mobileOpen" 
        x-transition.opacity
        class="fixed inset-0 z-40 bg-black/50 md:hidden"
        @click="mobileOpen = false"
    ></div>
    
    <!-- Sidebar -->
    <aside
        x-ref="sidebar"
        :class="{ 
            'translate-x-0': mobileOpen,
            '-translate-x-full': !mobileOpen,
            'w-64': !collapsed,
            'w-20': collapsed
        }"
        class="fixed top-0 left-0 z-50 h-screen bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 transition-all duration-300 ease-in-out transform md:translate-x-0 shadow-lg"
        aria-label="Sidebar"
    >
        <!-- Logo and Toggle Area -->
        <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200 dark:border-gray-800">
            <a 
                href="{{ $logoUrl }}" 
                class="flex items-center gap-3 overflow-hidden min-w-[40px]"
                :title="collapsed ? '{{ $logoText }}' : ''"
            >
                <img src="{{ $logoImage }}" alt="Logo" class="h-8 w-8 flex-shrink-0" />
                <span 
                    x-show="!collapsed"
                    class="font-semibold text-gray-900 dark:text-white whitespace-nowrap"
                >
                    {{ $logoText }}
                </span>
            </a>
            
            <!-- Desktop Toggle Button -->
            <button 
                @click="toggleSidebar"
                class="hidden md:flex items-center justify-center w-8 h-8 rounded-md text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                aria-label="Toggle sidebar"
                :title="collapsed ? 'Expand sidebar' : 'Collapse sidebar'"
                :aria-expanded="!collapsed"
            >
                <svg 
                    :class="{ 'rotate-180': collapsed }"
                    class="w-5 h-5 transition-transform duration-200" 
                    xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                >
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>
            
            <!-- Mobile Close Button -->
            <button 
                @click="mobileOpen = false"
                class="md:hidden flex items-center justify-center w-8 h-8 rounded-md text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                aria-label="Close sidebar"
            >
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Sidebar Content -->
        <div class="h-[calc(100vh-4rem)] overflow-y-auto py-4 px-3">
            <!-- Navigation Menu -->
            <nav aria-label="Main Navigation">
                <ul class="space-y-1.5">
                    {{ $slot }}
                </ul>
            </nav>
        </div>
    </aside>
    
    <!-- Main Content Wrapper -->
    <div 
        :class="{ 
            'md:ml-64': !collapsed, 
            'md:ml-20': collapsed 
        }"
        class="transition-all duration-300 ease-in-out min-h-screen"
    >
        <!-- Top Bar with Mobile Toggle -->
        <header class="sticky top-0 z-30 flex items-center h-16 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 sm:px-6">
            <!-- Mobile Toggle Button -->
            <button 
                @click="toggleMobile"
                data-sidebar-toggle
                class="md:hidden flex items-center justify-center w-10 h-10 -ml-2 rounded-md text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                aria-label="Open sidebar"
                :aria-expanded="mobileOpen"
            >
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12h18" />
                    <path d="M3 6h18" />
                    <path d="M3 18h18" />
                </svg>
            </button>
            
            <!-- Page Title -->
            <h1 class="ml-2 md:ml-0 text-lg font-semibold text-gray-900 dark:text-white">
                {{ $pageTitle }}
            </h1>
            
            <!-- Right Side Actions -->
            <div class="ml-auto flex items-center space-x-4">
                {{ $topBarActions ?? '' }}
            </div>
        </header>
        
        <!-- Main Content -->
        <main class="p-4 sm:p-6">
            {{ $content }}
        </main>
    </div>
</div>