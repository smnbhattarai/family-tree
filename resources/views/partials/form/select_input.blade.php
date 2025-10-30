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
            @foreach($options as $id => $display)
                <option
                    value="{{ $id }}"
                    @isset($display['image']) data-image="{{ $display['image'] }}" @endisset
                    @if(is_array(old($name)))
                        @if(in_array($id, old($name))) selected @endif
                    @else
                        @selected($id == old($name))
                    @endif
                    @if(isset($selected))
                        @if(is_array($selected))
                            @if(in_array($id, $selected)) selected @endif
                        @endif
                        @selected($id == $selected)
                    @endif
                >
                    {{ $display['text'] }}
                </option>
            @endforeach
        @endif
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @enderror
</div>


