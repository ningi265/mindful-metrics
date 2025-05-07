<!-- resources/views/components/sidebar-section.blade.php -->
@props([
    'title' => null,
    'collapsible' => false,
    'defaultOpen' => true
])

<div 
    @if($collapsible)
        x-data="{ open: {{ $defaultOpen ? 'true' : 'false' }} }"
    @endif
    class="mt-6 first:mt-0"
>
    @if($title)
        <div class="px-3 mb-2 flex items-center justify-between">
            <h3 
                x-show="!collapsed || window.innerWidth < 768"
                class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400"
            >
                {{ $title }}
            </h3>
            
            @if($collapsible)
                <button 
                    @click="open = !open"
                    x-show="!collapsed || window.innerWidth < 768"
                    class="p-1 rounded-md text-gray-400 hover:text-gray-500 dark:hover:text-gray-300"
                    aria-label="Toggle section"
                >
                    <svg 
                        :class="{ 'rotate-180': !open }"
                        class="w-4 h-4 transition-transform" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"
                    >
                        <path d="m18 15-6-6-6 6" />
                    </svg>
                </button>
            @endif
        </div>
    @endif
    
    <ul 
        @if($collapsible)
            x-show="open"
            x-collapse
        @endif
        class="space-y-1.5"
    >
        {{ $slot }}
    </ul>
</div>