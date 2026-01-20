<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Leads</h2>
            <a href="{{ route('leads.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow-lg">
                + Tambah Lead
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-900 font-semibold rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    @forelse ($leads as $lead)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $lead->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $lead->email ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClasses = [
                                        'new' => 'bg-blue-300 text-blue-900',
                                        'processing' => 'bg-yellow-300 text-yellow-900',
                                        'approved' => 'bg-green-300 text-green-900',
                                        'rejected' => 'bg-red-300 text-red-900',
                                    ];
                                @endphp
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClasses[$lead->status] ?? 'bg-gray-300 text-gray-700' }}">
                                    {{ ucfirst($lead->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center flex justify-center space-x-4">
                                <a href="{{ route('leads.edit', $lead) }}"
                                    class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                                <form action="{{ route('leads.destroy', $lead) }}" method="POST"
                                    onsubmit="return confirm('Hapus lead ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-400 font-semibold">
                                Belum ada lead
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
