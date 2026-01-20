<x-app-layout>
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Projects</h2>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-900 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">Lead</th>
                        <th class="px-6 py-3 text-left">Product</th>
                        <th class="px-6 py-3 text-left">Notes</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $project->lead->name }}</td>
                            <td class="px-6 py-4">{{ $project->product->name }}</td>
                            <td class="px-6 py-4">{{ $project->notes ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if ($project->status == 'pending')
                                    <span
                                        class="px-3 py-1 bg-yellow-300 text-yellow-900 rounded-full text-xs font-semibold">Pending</span>
                                @elseif($project->status == 'approved')
                                    <span
                                        class="px-3 py-1 bg-green-300 text-green-900 rounded-full text-xs font-semibold">Approved</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if ($project->status == 'pending')
                                    <form action="{{ route('projects.approve', $project) }}" method="POST">
                                        @csrf
                                        <button
                                            class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-sm">Approve</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-gray-400 font-semibold">
                                Belum ada project
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
