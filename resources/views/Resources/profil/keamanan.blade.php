<form action="{{ route('resetPassword', $user->id) }}" method="POST" class="space-y-4">
    @csrf
    <div class="relative">
        <label for="email" class="block text-sm font-medium text-gray-700 sm:mb-2">Email</label>
        <div class="relative">
            <input id="email" name="email" type="email" value="{{ $user->email }}"
                placeholder="e.g taufikhidayat@gmail.com"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 sm:py-3 text-gray-800 placeholder-gray-500">
        </div>
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="relative">
        <label for="password" class="block text-sm font-medium text-gray-700 sm:mb-2">Password</label>
        <div class="relative">
            <input id="password" name="password" type="password" placeholder="Your password"
                class="w-full rounded-lg border border-gray-300 px-4 py-2 sm:py-3 text-gray-800 placeholder-gray-500">
            <button type="button" id="togglePassword"
                class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                <i class="fa-solid fa-eye" id="passwordIcon"></i>
            </button>
        </div>
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit"
        class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 w-full mt-6">Simpan</button>
</form>

<script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const passwordIcon = document.getElementById("passwordIcon");

    togglePassword.addEventListener("click", () => {
        const type = passwordInput.type === "password" ? "text" : "password";
        passwordInput.type = type;

        passwordIcon.classList.toggle("fa-eye");
        passwordIcon.classList.toggle("fa-eye-slash");
    });
</script>
