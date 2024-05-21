{{-- Display pagination links --}}
@if ($pagination_data['total'] > $pagination_data['per_page'])
    <div class="mt-4 w-full px-24 flex justify-end">
        {{-- Previous page link --}}
        @if ($pagination_data['prev_page_url'])
            <a href="{{$currentRoute}}?page={{$prev}}" class="mr-4 bg-gray-200 px-2 rounded-xl w-20 hover:bg-blue-300 duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 inline">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                </svg>
                Prev</a>
        @endif

        {{-- Next page link --}}
        @if ($pagination_data['next_page_url'])
            <a href="{{$currentRoute}}?page={{$next}}" class="ml-2 bg-gray-200 px-2 rounded-xl w-20 text-center hover:bg-blue-300 duration-300">Next
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 inline">
                    <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
                </svg>
            </a>
        @endif
    </div>
@endif
