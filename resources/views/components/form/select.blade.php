@props(
    [
        'label'=>'',
        'name'=>'',
        'placeholder'=>'',
        'options'=>[],
        'selected'=>''
    ]
)

<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<select name="{{ $name }}" id="{{ $name }}" class="
form-control
@error($name) is-invalid @enderror">
<option value="">{{ $placeholder }}</option>
    @foreach($options as $key => $option)
        <option value="{{ $key }}" {{ $key==old($name,$selected) ? 'selected' : '' }}>{{ $option }}</option>
    @endforeach
</select>
@error($name)
    <span class="text-md text-danger">{{ $message }}</span>
@enderror