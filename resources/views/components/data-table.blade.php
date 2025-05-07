@props(['title', 'icon', 'columns', 'rows', 'viewAllLink'])

<div class="table-card">
    <div class="card-header">
        <h3 class="card-title">
            {!! $icon !!}
            {{ $title }}
        </h3>
        @if ($viewAllLink)
            <div class="card-actions">
                <a href="{{ $viewAllLink }}" class="btn-text">View All</a>
            </div>
        @endif
    </div>
    
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        @foreach ($row as $index => $cell)
                            <td>
                                @if (strtolower($cell) === 'ready')
                                    <span class="status status-ready">{{ $cell }}</span>
                                @elseif (strtolower($cell) === 'pending')
                                    <span class="status status-pending">{{ $cell }}</span>
                                @elseif (strtolower($cell) === 'low stock')
                                    <span class="status status-low">{{ $cell }}</span>
                                @else
                                    {{ $cell }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="empty-state">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <h4 class="empty-state-title">No data available</h4>
                            <p class="empty-state-text">There are no items to display for the selected criteria.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>