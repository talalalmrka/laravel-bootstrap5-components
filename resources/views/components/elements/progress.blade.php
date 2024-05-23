<!--<div class="d-flex align-items-center">
    @if (!empty($showLabel))
        <div>
            <div class="h5 mb-0 me-3 font-weight-bold text-gray-800">{{ $value }}%</div>
        </div>
    @endif
    @if (!empty($value))
        <div class="progress progress-sm flex-grow-1" role="progressbar" aria-label="{{ $value }}%" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-{{ $color }}" style="width: {{ $value }}%"></div>
        </div>
    @endif
</div>-->

<div {{ $attributes }}>
    <div class="progress-bar bg-{{ $color }}" style="width: {{ $value }}%"></div>
    @if ($showPercent)
        <small class="percent">
            {{ $value }}%
        </small>
    @endif
</div>
