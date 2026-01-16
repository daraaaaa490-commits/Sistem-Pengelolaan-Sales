<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('penjualan.store') }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label for="tanggal_penjualan" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal_penjualan" id="tanggal_penjualan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
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
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                            <input type="number" name="total" id="total" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan
                            </button>
                            <a href="{{ route('penjualan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
