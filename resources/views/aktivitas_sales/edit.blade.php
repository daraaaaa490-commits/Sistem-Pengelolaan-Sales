<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Aktivitas Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('aktivitas-sales.update', $aktivitasSales->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('tanggal', $aktivitasSales->tanggal) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="pelanggan_id" class="block text-sm font-medium text-gray-700">Pelanggan</label>
                            @if(\App\Models\Pelanggan::count() == 0)
                                <p class="text-red-500 text-sm">Tidak ada pelanggan tersedia. <a href="{{ route('pelanggan.create') }}" class="text-blue-600 hover:underline">Tambah pelanggan dulu</a>.</p>
                                <select name="pelanggan_id" id="pelanggan_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                                    <option value="">Pilih Pelanggan</option>
                                </select>
                            @else
                                <select name="pelanggan_id" id="pelanggan_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach(\App\Models\Pelanggan::all() as $pelanggan)
                                        <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id', $aktivitasSales->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="aktivitas" class="block text-sm font-medium text-gray-700">Aktivitas</label>
                            <textarea name="aktivitas" id="aktivitas" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('aktivitas', $aktivitasSales->aktivitas) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="hasil" class="block text-sm font-medium text-gray-700">Hasil</label>
                            <select name="hasil" id="hasil" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="berhasil" {{ old('hasil', $aktivitasSales->hasil) == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                                <option value="tidak berhasil" {{ old('hasil', $aktivitasSales->hasil) == 'tidak berhasil' ? 'selected' : '' }}>Tidak Berhasil</option>
                                <option value="pending" {{ old('hasil', $aktivitasSales->hasil) == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                            <a href="{{ route('aktivitas-sales.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>