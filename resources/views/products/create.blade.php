<x-app-layout>
    <div class="p-6 bg-gray-100 min-h-screen flex justify-center items-start">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Tambah Produk</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-900 font-semibold rounded shadow">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nama</label>
                    <input name="name" placeholder="Nama Produk" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Harga</label>
                    <input name="price" placeholder="Harga Produk" required type="number" step="0.01"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow-lg">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
