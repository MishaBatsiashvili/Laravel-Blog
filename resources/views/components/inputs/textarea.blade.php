<x-inputs.wrp>
    <x-inputs.label name="{{$name}}" />
    <textarea
        id="{{$name}}"
        type="text"
        name="{{$name}}"
        class="w-full
        rounded-lg border-1 border-cyan-500 focus:border-cyan-600 transition
        ring-1 ring-transparent focus:ring-cyan-600"
        rows="5"
    >{{ $value }}</textarea>
    <x-inputs.error name={{$name}} />
</x-inputs.wrp>
