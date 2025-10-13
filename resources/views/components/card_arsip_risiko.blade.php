<div class="card custom-card text-white" onclick="window.location='{{ $link }}'" style="background-color: {{ $color }};">
    <div class="card-content">
        <div class="card-text-section">
            <h5 class="card-title">{{ $number }}</h5>
            <p class="card-text">{{ $text }}</p>
        </div>
        <i class="{{ $icon }} card-icon"></i>
    </div>
</div>