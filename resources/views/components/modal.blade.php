@props(['id'])

<div id="{{ $id }}" class="relative z-10 hidden"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity"
        aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div
            class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative w-full transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:max-w-lg">
                <div class="relative bg-white p-16">
                    <div class="hover:text-primary absolute right-4 top-4 cursor-pointer transition"
                        onclick="closeModals()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-x-icon lucide-x">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
