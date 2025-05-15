<x-modal id="login-modal">
    <h3 class="text-primary text-4xl font-black">
        Rekap.com
    </h3>
    <form action="{{ route('login') }}" method="POST"
        class="flex w-full max-w-64 flex-col items-center space-y-4">
        @csrf
        <div class="space-y-2">
            <input name="email" type="email" placeholder="Email"
                class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none">
            <input name="password" type="password" placeholder="Password"
                class="border-primary flex h-12 w-full items-center rounded-xl border-2 px-4 text-sm focus:outline-none">
        </div>
        <div class="flex flex-col items-center space-y-2">
            <button type="submit"
                class="border-primary focus:border-primary hover:text-primary hover:bg-primary/10 flex h-12 cursor-pointer items-center rounded-xl border-2 px-8 text-sm transition focus:outline-none">
                Masuk
            </button>
            <div class="text-sm">
                Belum punya akun?
                <button type="button" target="modal#register-modal"
                    class="cursor-pointer text-blue-700 hover:underline">
                    Daftar Disini
                </button>
            </div>
        </div>
    </form>
</x-modal>
