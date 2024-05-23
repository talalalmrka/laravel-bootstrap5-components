
<form {{ $attributes }}>
    @csrf
    @if (!empty($secured_method))
        @method($secured_method)
    @endif
    @content($content)
    @content($submit)
</form>
