<x-modal id="register-modal">
    <div class="space-y-2 text-center">
        <h3 class="text-primary text-4xl font-black">
            Rekap.com
        </h3>
        <div class="text-gray-500">Pendaftaran</div>
    </div>
    <form action="{{ route('register') }}" method="POST"
        class="flex w-full max-w-64 flex-col items-center space-y-4">
        @csrf
        <div class="space-y-2">
            <input type="text" placeholder="Nama"
                class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none">
            <input type="email" placeholder="Email"
                class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none">
            <input type="password" placeholder="Password"
                class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none">
        </div>
        <div class="flex flex-col items-center space-y-2">
            <button type="submit"
                class="border-primary focus:border-primary hover:text-primary hover:bg-primary/10 flex h-12 cursor-pointer items-center rounded-xl border-2 px-8 text-sm transition focus:outline-none">
                Daftar
            </button>
            <div class="text-sm">
                Sudah punya akun?
                <button type="button" target="modal#login-modal"
                    class="cursor-pointer text-blue-700 hover:underline">
                    Masuk Disini
                </button>
            </div>
        </div>
    </form>
</x-modal>
