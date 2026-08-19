@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'helper' => '',
])

<div>
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            {{ $label }}

            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2
                         bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                         focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
        ]) }}>

    @if ($helper)
        <p class="mt-1.5 text-xs text-blue-600 dark:text-blue-400 flex items-center gap-1">
            <i class="fa-solid fa-circle-info"></i> {{ $helper }}
        </p>
    @endif

    @error($name)
        <p class="mt-2 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>

