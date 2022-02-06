<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <x-buttons.primary href="{{ route('post.create') }}" >
                Create New Post
            </x-buttons.primary>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="overflow-hidden -mx-3">
                <div class="flex flex-wrap">
                    <x-admin.sidebar />
                    <x-admin.table-wrp>
                        @if (isset($posts) && count($posts))
                            @foreach ($posts as $post)
                                <x-admin.post :post="$post" />
                            @endforeach
                        @else
                            <div class="p-6 bg-white sm:rounded-lg shadow">No Posts</div>
                        @endif
                    </x-admin.table-wrp>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
