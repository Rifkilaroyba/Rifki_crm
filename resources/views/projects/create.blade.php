<x-app-layout>
    <div class="p-6 bg-gray-100 min-h-screen flex justify-center items-start">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Buat Project untuk Lead: {{ $lead->name }}</h2>

            <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="lead_id" value="{{ $lead->id }}">

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Pilih Product</label>
                    <select name="product_id" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Catatan / Notes</label>
                    <textarea name="notes" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow-lg">
                    Simpan Project
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
