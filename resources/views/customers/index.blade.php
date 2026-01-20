<x-app-layout>
    <div class="p-6 bg-gray-100 min-h-screen">
        <h2 class="text-2xl font-bold mb-4">Customer</h2>

        <table class="min-w-full bg-white shadow rounded">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">No HP</th>
                    <th class="px-4 py-2">Layanan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $c)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $c->name }}</td>
                        <td class="px-4 py-2">{{ $c->email ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $c->phone ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $c->product->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-4">Belum ada customer</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
