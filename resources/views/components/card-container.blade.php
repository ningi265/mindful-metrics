<!-- resources/views/components/card-container.blade.php -->
<div class="card">
    @if($title)
    <div class="card-header">
        <h3 class="card-title">
            @if($icon)
                {!! $icon !!}
            @endif
            {{ $title }}
        </h3>
        @if(count($actions) > 0)
        <div class="card-actions">
            @foreach($actions as $action)
                {!! $action !!}
            @endforeach
        </div>
        @endif
    </div>
    @endif
    <div class="card-content">
        {{ $slot }}
    </div>
</div>