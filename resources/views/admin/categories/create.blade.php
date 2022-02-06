<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a
            href="{{ route('admin.categories.index') }}"
            class="inline-block py-1.5 px-4 text-sm bg-cyan-500 hover:bg-cyan-600 rounded-lg text-white mb-4 transition"
            >Back to Categories</a>
            <div class="bg-white p-12 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <x-inputs.text name="name" value="{{ old('name') }}" />
                    <div>
                        <x-inputs.text name="slug" value="{{ old('slug') }}">
                            <x-slot name="hint">
                                <span class="mt-2 block text-gray-500 text-sm">Spaces will be replaced with "-" symbol</span>
                            </x-slot>
                        </x-inputs.text>
                    </div>

                    <x-inputs.submit-button />
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
