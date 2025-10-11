<div class="mb-3">
    <label
        for="{{ $id ?? ($name ?? '') }}"
        class="form-label">{{ $label ?? ($name ?? '') }}
    </label>
    <input
        class="form-control @error($name) is-invalid @enderror"
        id="{{$id ?? ($name ?? '') }}"
        name="{{ $name ?? '' }}"
        type="file"
        {{ isset($required) ? ($required ? 'required' : '') : '' }}
        @if(isset($accept)) accept="{{ $accept }}" @endif
    >
    @error($name)
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @enderror
</div>
