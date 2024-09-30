<div class="mb-3">
    <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
    <input class="form-control @error($name) is-invalid @enderror" type="{{ $type ?? 'text'  }}" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}">
    @error($name)     
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>