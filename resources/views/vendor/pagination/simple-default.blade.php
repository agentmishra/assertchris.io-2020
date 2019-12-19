@if ($paginator->hasPages())
    <nav class="flex flex-row mb-8 px-4">
        @if ($paginator->onFirstPage())
            <span class="text-gray-700">@lang('pagination.previous')</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="text-blue-500 underline">@lang('pagination.previous')</a>
        @endif
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-blue-500 underline ml-2">@lang('pagination.next')</a>
        @else
            <span class="text-gray-700 ml-2">@lang('pagination.next')</span>
        @endif
    </nav>
@endif
