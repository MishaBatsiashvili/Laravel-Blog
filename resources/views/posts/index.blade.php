<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">

            <div class="w-full flex sm:flex-row flex-col justify-center mb-12">
                <x-category-dropdown />
                <form method="GET" action="" class="flex sm:ml-3 mt-3 sm:mt-0">
                    <div class="w-full sm:w-auto">
                        @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input
                            type="text"
                            name="search"
                            class="border-0 ring-0 focus:ring-1 focus:ring-orange-600 rounded-lg shadow transition w-full"
                            placeholder="Search..."
                            value="{{ request('search') }}"
                        >
                    </div>

                    <button
                        class="ml-3 py-1.5 px-4 text-sm bg-orange-600 hover:bg-orange-700 rounded-lg text-white transition"
                    >
                        Search
                    </button>
                </form>
            </div>

            <div>
                @if(request('search'))
                <div class="mb-10">Results for: <span class="font-medium">{{ request('search') }}</span></div>
                @endif

                @if(count($posts))
                <div class="w-full flex flex-wrap">
                    @foreach ($posts as $post)
                    <x-posts.post :post="$post" />
                    @endforeach
                </div>
            </div>

            <div class="px-3 sm:px-0">
                {{ $posts->links('pagination::simple-tailwind') }}
            </div>
            @else
            <div class="block w-full text-center">
                No Posts Found <span class="text-lg">&#128546;</span>
            </div>
            @endif

        </div>
    </div>

</x-guest-layout>
