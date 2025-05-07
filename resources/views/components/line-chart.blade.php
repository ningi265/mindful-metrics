<!-- resources/views/components/line-chart.blade.php -->
@props(['id', 'title', 'icon', 'timeOptions' => [], 'defaultTimeOption' => '', 'height' => '280px', 'chartType' => 'line', 'showLegend' => true])

<div class="chart-card modern-chart">
    <div class="card-header">
        <h3 class="card-title">
            {!! $icon !!}
            {{ $title }}
        </h3>
        <div class="card-actions">
            <select class="time-select" data-chart-id="{{ $id }}">
                @foreach($timeOptions as $option)
                    <option {{ $option == $defaultTimeOption ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    @if($showLegend)
    <div class="chart-legend" id="{{ $id }}-legend"></div>
    @endif
    
    <div class="chart-container" style="height: {{ $height }};" id="{{ $id }}">
        <div class="chart-loading">
            <div class="spinner"></div>
        </div>
    </div>
    
    <div class="chart-footer">
        <div class="chart-insights" id="{{ $id }}-insights">
            <!-- Dynamic insights will be inserted here via JS -->
        </div>
    </div>
</div>