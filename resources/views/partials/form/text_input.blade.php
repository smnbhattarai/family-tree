<div class="form-floating mb-3">

    <input
        type="{{ $type ?? 'text' }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name ?? '' }}"
        id="{{$id ?? ($name ?? '') }}"
        value="{{ $value ?? old($name) }}"
        placeholder="{{ $label ?? '' }}"
        {{ isset($required) ? ($required ? 'required' : '') : '' }}
        {{ isset($disabled) ? ($disabled ? 'disabled' : '') : '' }}
        @if(isset($max_date) && $type == 'date') max="{{ $max_date }}" @endif
        @if(isset($min_date) && $type == 'date') max="{{ $min_date }}" @endif
    >

    <label
        for="{{ $id ?? ($name ?? '') }}"
        class="form-label">
        {{ $label ?? '' }}
    </label>

    @error($name)
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @enderror

</div>
