<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a
            href="{{ route('dashboard') }}"
            class="inline-block py-1.5 px-4 text-sm bg-cyan-500 hover:bg-cyan-600 rounded-lg text-white mb-4 transition"
            >Back to Dashboard</a>
            <div class="bg-white p-12 shadow-sm sm:rounded-lg">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-inputs.text name="title" value="{{ old('title') }}" />
                    <x-inputs.textarea name="excerpt" value="{{ old('excerpt') }}" />
                    {{-- <x-inputs.textarea name="body" value="" /> --}}
                    <div class="mb-6">
                        <textarea id="editor" name="body">{{ old('body') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <x-inputs.label name="thumbnail" />
                        <input type="file" name="thumbnail" id="thumbnail">
                        @error('thumbnail')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <x-inputs.wrp>
                        <x-inputs.label name="Body" />
                        <textarea
                            name="body"
                            id="markdown"
                            class="w-full
                            rounded-lg border-1 border-cyan-500 focus:border-cyan-600 transition
                            ring-1 ring-transparent focus:ring-cyan-600"
                            rows="5"
                        ></textarea>
                    </x-inputs.wrp> --}}

                    <x-inputs.wrp>
                        <x-inputs.label name="category" />
                        @if(isset($categories) && count($categories))
                        <select name="category_id" id="category" class="border-0 ring-1 focus:ring-2 ring-cyan-500 focus:ring-cyan-600 rounded-lg shadow transition">
                            <option value="">No Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @endif
                    </x-inputs.wrp>

                    <x-inputs.wrp>
                        <x-inputs.label name="status" />
                        <select name="status" id="status" class="border-0 ring-1 focus:ring-2 ring-cyan-500 focus:ring-cyan-600 rounded-lg shadow transition">
                            <option value="0">Draft</option>
                            <option value="1">Published</option>
                        </select>
                    </x-inputs.wrp>

                    <x-inputs.submit-button />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
