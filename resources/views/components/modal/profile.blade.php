<x-modal id="profile-modal">
    <div class="space-y-2 text-center">
        <h3 class="text-primary text-xl font-black">
            Profil Saya
        </h3>
    </div>
    <div class="flex w-full max-w-64 flex-col items-center space-y-4">
        <form id="profile-form" action="{{ route('profile.update') }}"
            method="POST" enctype="multipart/form-data" class="w-full space-y-4">
            @csrf
            @method('PUT')
            <input id="picture" type="file" name="picture"
                class="absolute -top-full" onchange="previewImage(event)"
                accept="image/jpeg,image/png" />
            <div class="flex items-center justify-center">
                <div id="picture-preview-placeholder"
                    onclick="document.getElementById('picture').click()"
                    @class([
                        'flex size-24 cursor-pointer items-center justify-center rounded-full border-2 border-gray-300 bg-gray-100 transition hover:bg-gray-200',
                        'hidden' => Auth::user()?->picture,
                    ])>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-upload-icon lucide-upload">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="17 8 12 3 7 8" />
                        <line x1="12" x2="12" y1="3"
                            y2="15" />
                    </svg>
                </div>
                <img id="picture-preview"
                    src="{{ Auth::user() ? Storage::url(Auth::user()?->picture) : '' }}"
                    alt="{{ Auth::user()?->name }}"
                    onclick="document.getElementById('picture').click()"
                    @class([
                        'size-24 cursor-pointer rounded-full border-2 border-gray-300 object-cover transition hover:bg-gray-200',
                        'hidden' => !Auth::user()?->picture,
                    ]) />
            </div>
            <div class="space-y-2">
                <input name="name" type="text" placeholder="Nama"
                    class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none"
                    value="{{ auth()->user()->name }}">
                <input type="email" placeholder="Email"
                    class="border-primary flex h-12 w-full items-center rounded-xl border-2 bg-gray-100 px-4 text-sm focus:outline-none"
                    value="{{ auth()->user()->email }}" disabled>
                <input name="password" type="password" placeholder="Password"
                    class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none">
            </div>
        </form>
        <div class="flex w-full items-center justify-between gap-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit"
                    class="block cursor-pointer text-sm text-blue-700 underline">
                    Keluar
                </button>
            </form>
            <button type="button"
                onclick="document.querySelector('#profile-form').submit()"
                class="border-primary focus:border-primary hover:text-primary hover:bg-primary/10 flex h-12 cursor-pointer items-center rounded-xl border-2 px-8 text-sm transition focus:outline-none">
                Simpan
            </button>
        </div>
    </div>
</x-modal>

@push('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const id = input.getAttribute('id');
            const preview = document.getElementById(id + '-preview');
            const placeholder = document.getElementById(id +
                '-preview-placeholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
                placeholder.classList.add('hidden');
            }
        }
    </script>
@endpush
