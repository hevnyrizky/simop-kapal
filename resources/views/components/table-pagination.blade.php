@props(['data'])

<div class="px-6 py-4 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <p class="text-sm text-gray-700 dark:text-gray-300">
            Menampilkan
            <span class="font-medium">{{ $data->firstItem() }}</span>
            sampai
            <span class="font-medium">{{ $data->lastItem() }}</span>
            dari
            <span class="font-medium">{{ $data->total() }}</span>
            data
        </p>

        <div>
            {{ $data->links() }}
        </div>

    </div>
</div>

