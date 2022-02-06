<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Your Bookmarks') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:-mx-3 lg:-mx-4">
                <x-admin.table-wrp full>
                    @if (isset($posts) && count($posts))
                        @foreach ($posts as $post)
                            <x-admin.post :post="$post" :isBookmark="true" />
                        @endforeach
                    @else
                        <div class="p-6 bg-white sm:rounded-lg shadow">No Posts</div>
                    @endif
                </x-admin.table-wrp>
            </div>
        </div>
    </div>
</x-app-layout>
