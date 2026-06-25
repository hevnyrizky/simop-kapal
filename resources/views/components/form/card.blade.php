@props([
    'title' => '',
    'subtitle' => '',
])

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">

    {{-- HEADER --}}
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ $title }}
        </h2>

        @if ($subtitle)
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    {{-- BODY --}}
    <div class="p-6">
        {{ $slot }}
    </div>

</div>

