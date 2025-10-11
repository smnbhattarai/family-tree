<div class="mb-3">
    <label
        for="{{ $id ?? ($name ?? '') }}"
        class="form-label">{{ $label ?? '' }}
    </label>
    <select
        class="form-select @error($name) is-invalid @enderror"
        id="{{ $id ?? ($name ?? '') }}"
        name="{{ $name ?? '' }}@if(isset($multiple))[]@endif"
        {{ isset($required) ? ($required ? 'required' : '') : '' }}
        {{ isset($disabled) ? ($disabled ? 'disabled' : '') : '' }}
        @if(isset($multiple))multiple autocomplete="off"@endif
    >
        <option value="">{{ __('Choose...') }}</option>
        @if(isset($options))
            @foreach($options as $value => $display)
                <option
                    value="{{ $value }}"
                    @if(is_array(old($name)))
                        @if(in_array($value, old($name))) selected @endif
                    @else
                        @selected($value == old($name))
                    @endif
                >
                    {{ $display }}
                </option>
            @endforeach
        @endif
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @enderror
</div>


