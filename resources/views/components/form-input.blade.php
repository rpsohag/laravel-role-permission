<div class="mb-2">
    <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
    <input class="form-control @error($name) is-invalid @enderror" type="{{ $type ?? 'text'  }}" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder ?? '' }}">
    @error($name)     
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>