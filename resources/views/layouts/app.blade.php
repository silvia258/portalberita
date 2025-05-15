<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=League+Spartan:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="space-y-4">
    <header class="container mx-auto">
        <div class="flex items-center justify-between gap-4 p-4">
            <h1 class="text-primary text-4xl font-black">Rekap.com</h1>
            <div class="flex gap-4">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-search-icon lucide-search text-primary absolute left-4 top-1/2 size-4 -translate-y-1/2">
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>
                    <input type="text" placeholder="Telusuri"
                        class="border-primary focus:border-primary flex h-12 items-center rounded-xl border-2 pl-10 pr-4 text-sm focus:outline-none">
                </div>
                @auth
                    <button target="modal#profile-modal"
                        class="border-primary focus:border-primary hover:text-primary hover:bg-primary/10 flex size-12 cursor-pointer items-center justify-center rounded-full border-2 text-gray-500 transition focus:outline-none overflow-hidden">
                        @if (Auth::user()->picture)
                            <img src="{{ Storage::url(Auth::user()->picture) }}"
                                alt="{{ Auth::user()->name }}" class="size-full">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-user-icon lucide-user">
                                <path
                                    d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        @endif
                    </button>
                @else
                    <button target="modal#login-modal"
                        class="border-primary focus:border-primary hover:text-primary hover:bg-primary/10 flex h-12 cursor-pointer items-center rounded-xl border-2 px-4 text-sm transition focus:outline-none">
                        Masuk
                    </button>
                @endauth
            </div>
        </div>
    </header>

    <x-categories-bar :categories="$categories" />

    @yield('content')

    <x-modal.login />
    <x-modal.register />

    @auth
        <x-modal.profile />
    @endauth

    <script>
        function closeModals() {
            document.querySelectorAll('[role^="dialog"]:not(.hidden)').forEach((
                el) => {
                el.classList.add('hidden');
            });
        }

        document.querySelectorAll('[target^="modal"]').forEach((el) => {
            el.addEventListener('click', (e) => {
                e.preventDefault();
                closeModals();
                const target = el.getAttribute('target').split('#')[
                    1];
                document.getElementById(target).classList.toggle(
                    'hidden');
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
