<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Tambah Lead</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-900 font-semibold rounded shadow">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('leads.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nama</label>
                    <input name="name" placeholder="Nama" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input name="email" placeholder="Email"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">No HP</label>
                    <input name="phone" placeholder="No HP"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Perusahaan</label>
                    <input name="company" placeholder="Perusahaan"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow-lg">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
