@if(isset($options))
    <div class="mb-3">
        <p>{{ $label ?? '' }}</p>
        @foreach($options as $value => $display)
            <div class="form-check form-check-inline">
                <input
                    class="form-check-input @error($name) is-invalid @enderror"
                    type="radio"
                    name="{{ $name }}"
                    id="{{$id ?? ($name ?? '') }}{{ $value }}" value="{{ $value }}"
                    {{ isset($required) ? ($required ? 'required' : '') : '' }}
                >
                <label class="form-check-label" for="{{$id ?? ($name ?? '') }}{{ $value }}">{{ $display }}</label>
            </div>
        @endforeach
        @error($name)
        <div class="text-danger">{{ $errors->first($name) }}</div>
        @enderror
    </div>
@endif

