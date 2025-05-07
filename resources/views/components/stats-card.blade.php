<!-- resources/views/components/stats-card.blade.php -->
<div class="stat-card {{ $cardClass }}">
    <div class="stat-icon">
        {!! $icon !!}
    </div>
    <div class="stat-content">
        <div class="stat-label">{{ $label }}</div>
        <div class="stat-value">{{ $value }}</div>
        <div class="stat-meta">
            <div class="trend {{ $trend }}">
                @if($trend == 'up')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                @elseif($trend == 'down')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                        <polyline points="17 18 23 18 23 12"></polyline>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                @endif
                <span>{{ $trendValue }}</span>
            </div>
            <span class="divider"></span>
            <span>{{ $metaText }}</span>
        </div>
    </div>
</div>