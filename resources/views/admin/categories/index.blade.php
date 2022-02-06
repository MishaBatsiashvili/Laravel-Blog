<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
            <a
                href="{{ route('admin.category.create') }}"
                class="inline-block py-1.5 px-4 text-sm bg-cyan-500 hover:bg-cyan-600 rounded-lg text-white transition"
            >
            Create New Category
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex">
                    <x-admin.sidebar />
                    <x-admin.table-wrp>
                        @if (isset($categories) && count($categories))
                            @foreach ($categories as $category)
                                <x-admin.category :category="$category" />
                            @endforeach
                        @else
                            <div class="p-6 bg-white  sm:rounded-lg shadow">No Posts</div>
                        @endif
                    </x-admin.table-wrp>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
