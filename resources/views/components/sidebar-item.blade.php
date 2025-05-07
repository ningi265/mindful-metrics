<!-- resources/views/components/sidebar-item.blade.php -->
@props([
    'href' => '#',
    'icon' => null,
    'active' => false,
    'badge' => null,
    'badgeColor' => 'bg-blue-500'
])

<li>
    <a 
        href="{{ $href }}"
        @class([
            'flex items-center p-2 rounded-lg transition-colors',
            'text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800' => $active,
            'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' => !$active,
        ])
    >
        @if($icon)
            <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center text-gray-500 dark:text-gray-400">
                {!! $icon !!}
            </span>
        @endif
        
        <span 
            x-show="!collapsed || window.innerWidth < 768" 
            x-transition:enter="transition-opacity ease-in duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-out duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="ml-3 flex-1 whitespace-nowrap"
        >
            {{ $slot }}
        </span>
        
        @if($badge)
            <span 
                x-show="!collapsed || window.innerWidth < 768"
                class="inline-flex items-center justify-center px-2 ml-3 text-xs font-medium rounded-full {{ $badgeColor }} text-white"
            >
                {{ $badge }}
            </span>
        @endif
    </a>
</li>