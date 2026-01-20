<x-app-layout>
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Produk</h2>
            <a href="{{ route('products.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow-lg">
                + Tambah Produk
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-900 font-semibold rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded shadow">
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white font-semibold rounded shadow">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-6 text-center text-gray-400 font-semibold">
                                Belum ada produk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
