<x-app-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Edit Lead</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-900 font-semibold rounded shadow">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('leads.update', $lead) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nama</label>
                    <input name="name" value="{{ $lead->name }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input name="email" value="{{ $lead->email }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">No HP</label>
                    <input name="phone" value="{{ $lead->phone }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Perusahaan</label>
                    <input name="company" value="{{ $lead->company }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Status</label>
                    <select name="status"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="processing" {{ $lead->status == 'processing' ? 'selected' : '' }}>Processing
                        </option>
                        <option value="approved" {{ $lead->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $lead->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow-lg">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
