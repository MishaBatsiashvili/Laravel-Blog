<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account') }}
        </h2>
    </x-slot>

    <x-layout.content-wrp>
        <div class="flex justify-center">
            <div class="inline-block relative">
                <img
                    id="profile-image"
                    src="{{ $user->image ? asset('/storage/'.$user->image) : asset('/images/profile-placeholder.png') }}"
                    data-uploaded-src={{ $user->image ? asset('/storage/'.$user->image) : asset('/images/profile-placeholder.png') }}
                    class="w-[150px] h-[150px] rounded-full border shadow border-gray-300 object-cover"
                >
                <form
                    action="{{ route('account.image.store') }}"
                    method="post" enctype="multipart/form-data"

                    x-data="{ show: false }"
                    x-init="setTimeout(() => { show = ! show }, 1000)"
                    :class="show ? 'opacity-1 transition ease-in-out duration-400' : 'opacity-0 translate-y-5'"
                >
                    @csrf
                    <label for="profile-image-input" id="upload" class="
                        absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2
                        inline-block p-4 rounded-full
                        bg-orange-500 hover:bg-orange-600 cursor-pointer text-white
                    ">
                        <i data-feather="edit" class="w-4 h-4"></i>
                    </label>

                    <input id="profile-image-input" type="file" name="image" class="hidden">

                    <div id="upload-wrp" class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 flex items-center justify-center">
                        <button
                            type="button"
                            id="cancel-upload"
                            class="
                            inline-block p-4 mr-2 rounded-full
                            bg-red-500 hover:bg-red-600 cursor-pointer text-white
                            "
                        >
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                        </button>
                        <button
                            type="submit"
                            class="
                            inline-block p-4 rounded-full
                            bg-orange-500 hover:bg-orange-600 cursor-pointer text-white
                            "
                        >
                            <i data-feather="check" class="w-4 h-4"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-layout.content-wrp>

    <x-layout.content-wrp
        styled
        wrpStyles="max-w-2xl mx-auto"
    >
        <form action="{{ route('account.name.update') }}" method="post">
            @csrf
            @method('put')
            <x-inputs.text name="name" value="{{ $user->name }}" />
            @error('name')
                {{ $message }}
            @enderror
            <x-buttons.primary>
                Save Changes
            </x-buttons.primary>
        </form>
            {{-- <x-account.desc-item title="Name" desc="{{ ucwords($user->name) }}" />
            <x-account.desc-item title="Email" desc="{{ $user->email }}" /> --}}
    </x-layout.content-wrp>

</x-app-layout>

<script>
    window.addEventListener('load', () => {
        const fileInput = document.querySelector('#profile-image-input');
        const imageDom = document.querySelector('#profile-image');
        const uploadDom = document.querySelector('#upload');
        const cancelUploadDom = document.querySelector('#cancel-upload');
        const uploadWrp = document.querySelector('#upload-wrp');
        let showUpload = true;

        const toggleActionsVisibility = () => {
            if(showUpload){
                uploadDom.style.display = "";
                uploadWrp.style.display = "none";
                return;
            }
            uploadDom.style.display = "none";
            uploadWrp.style.display = "";
        }

        // init
        toggleActionsVisibility()

        fileInput.addEventListener('change', (e) => {
            const file = fileInput.files[0]
            if(file){
                imageDom.src = URL.createObjectURL(file);
                showUpload = false;
                toggleActionsVisibility();
            }
        });

        cancelUploadDom.addEventListener('click', () => {
            showUpload = true;
            imageDom.src = imageDom.getAttribute('data-uploaded-src');
            fileInput.value = '';
            toggleActionsVisibility();
        });
    });
</script>
