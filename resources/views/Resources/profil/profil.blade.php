<form action="{{ route('updateProfil', $user->id) }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block text-gray-700 font-medium mb-1">Nama</label>
        <input id="name" type="text" name="name" value="{{ $user->name }}" placeholder="Enter your name"
            class="w-full border border-gray-300 rounded-md p-2" required>
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-gray-700 font-medium mb-1">Jenis Kelamin</label>
        <select id="gender" class="w-full border border-gray-300 rounded-md p-2" name="gender" required>
            <option value="l">Laki-laki</option>
            <option value="p">Perempuan</option>
        </select>
        @error('gender')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-gray-700 font-medium mb-1">Tanggal Lahir</label>
        <input id="date_of_birth" type="date" name="date_of_birth"
            class="w-full border border-gray-300 rounded-md p-2" required>
        @error('date_of_birth')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="block text-gray-700 font-medium mb-1">Nomor Telepon</label>
        <input id="phone" type="number" name="phone" value="{{ $user->phone }}"
            placeholder="Enter your phone number" class="w-full border border-gray-300 rounded-md p-2" required>
        @error('phone')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

    </div>
    <button type="submit"
        class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 mt-6 w-full">Simpan</button>
</form>
