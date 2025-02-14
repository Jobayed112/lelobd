@php
    $paginator = $paginator ?? $paginator->onEachSide(1);
@endphp

@if ($paginator->hasPages())
    <div class="flex justify-center mt-4 flex-wrap">
        <!-- Previous Button -->
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 mx-2 bg-gray-300 text-gray-500 rounded-lg shadow cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 mx-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">Previous</a>
        @endif

        <!-- Pagination Links -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <span class="px-4 py-2 mx-2 bg-gray-300 text-gray-500 rounded-lg shadow">{{ $element }}</span>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 mx-2 bg-blue-500 text-white rounded-lg shadow">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 mx-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Button -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 mx-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">Next</a>
        @else
            <span class="px-4 py-2 mx-2 bg-gray-300 text-gray-500 rounded-lg shadow cursor-not-allowed">Next</span>
        @endif
    </div>
@endif
