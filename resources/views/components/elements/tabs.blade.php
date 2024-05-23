<!-- Nav tabs -->
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    @foreach ($tabs as $item)
        @php
            $tab_id = data_get($item, 'id');
            $tab_active = data_get($item, 'active', false);
            $tab_label = data_get($item, 'label', __('Tab'));
        @endphp
        <li class="nav-item" role="presentation">
            <button class="nav-link{{ active($tab_active) }}" id="{{ $tab_id }}-tab" data-bs-toggle="tab"
                data-bs-target="#{{ $tab_id }}" type="button" role="tab"
                aria-controls="{{ $tab_id }}" aria-selected="{{ $tab_active ? 'true' : 'false' }}">@content($tab_label)</button>
        </li>
    @endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content">
    @foreach ($tabs as $target)
        @php
            $target_id = data_get($target, 'id');
            $target_active = data_get($target, 'active', false);
            $target_content = data_get($target, 'content', __('Tab Content'));
        @endphp
        <div class="tab-pane{{ active($target_active) }}" id="{{ $target_id }}" role="tabpanel" aria-labelledby="{{ $target_id }}-tab" tabindex="0">@content($target_content)</div>
    @endforeach
</div>
