<div {{ $attributes }}>
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col me-2">
                <div class="fs-12px fw-bold text-{{ $color }} text-uppercase mb-1">
                    {{ $label }}
                </div>
                <div class="h5 card-title mb-0 fw-bold">{{ render_content($content) }}</div>
            </div>
            <div class="col-auto">
                <i class="{{ $icon }} fa-2x text-{{ $color }}"></i>
            </div>
        </div>
    </div>
</div>
