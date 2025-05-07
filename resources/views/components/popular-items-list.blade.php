@props(['title', 'icon', 'items'])

<div class="popular-card">
    <div class="card-header">
        <h3 class="card-title">
            {!! $icon !!}
            {{ $title }}
        </h3>
        <div class="card-actions">
            <select class="time-select" onchange="updatePopularItems('{{ Str::slug($title) }}', this.value)">
                <option value="7">Last 7 Days</option>
                <option value="30" selected>Last 30 Days</option>
                <option value="90">Last 90 Days</option>
            </select>
        </div>
    </div>
    
    <div class="popular-items-list" id="{{ Str::slug($title) }}">
        @forelse ($items as $index => $item)
            <div class="popular-item">
                <div class="item-rank">{{ $index + 1 }}</div>
                <div class="item-info">
                    <span class="item-name">{{ $item['name'] }}</span>
                    <div class="item-progress" data-percentage="{{ $item['percentage'] }}">
                        <div class="progress-bar" style="width: {{ $item['percentage'] }}%"></div>
                    </div>
                </div>
                <span class="item-count">{{ $item['count'] }}</span>
            </div>
        @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <h4 class="empty-state-title">No data available</h4>
                <p class="empty-state-text">There are no items to display for the selected time period.</p>
            </div>
        @endforelse
    </div>
</div>
