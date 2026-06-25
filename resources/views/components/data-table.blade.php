@props([
    'data' => null,
    'paginated' => false,
])

<div
    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">

    {{-- HEADER --}}
    <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/80">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                {{ $header ?? '' }}
            </div>

            @if (isset($search))
                <div class="w-full md:w-96">
                    {{ $search }}
                </div>
            @endif

        </div>
    </div>

    {{-- FILTER --}}
    @if (isset($filters))
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            {{ $filters }}
        </div>
    @endif

    {{-- ACTION --}}
    @if (isset($actions))
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            {{ $actions }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800/80">
                <tr>
                    {{ $columns }}
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                {{ $rows }}
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    @if ($paginated && $data)
        <x-table-pagination class="no-print" :data="$data" />
    @endif
</div>

