@props([
    'name',
    'label' => 'Default Label',  // default value for the label
    'type' => 'text',             // default type is 'text'
    'placeholder' => '',          // default placeholder is empty
    'value' => null               // default value is null
])

<div>
    <label for="{{ $name }}" class="text-lg font-semibold text-gray-800">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="block w-full mt-2 p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm hover:shadow-md" 
        placeholder="{{ $placeholder }}"
        value="{{ $value ?? old($name) }}"
        {{ $attributes }}
        required
    >
</div>
