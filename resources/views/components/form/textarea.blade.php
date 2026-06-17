@props([
    'id',
    'label'=>'',
    'name',
    'placeholder'=>'',
    'value'=>'',
    'type' => 'text',
])
<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<textarea name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" class="
    form-control
    @error($name) is-invalid @enderror
">{{ old($name, $value) }}</textarea>
@error($name)
    <span class="text-md text-danger">{{ $message }}</span>
@enderror