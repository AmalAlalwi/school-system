@props([
    'id',
    'label'=>'',
    'name',
    'placeholder'=>'',
    'value'=>'',
    'type' => 'text',
])
<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
    class="
    form-control
    @error($name) is-invalid @enderror
    
    ">
@error($name)
    <span class="text-md text-danger">{{ $message }}</span>
@enderror