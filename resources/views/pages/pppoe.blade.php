@extends('dashboard')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Koneksi Aktif PPPoE</h1>
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Caller ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uptime</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($activePPPoE as $connection)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $connection['name'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $connection['address'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $connection['caller-id'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $connection['uptime'] ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada koneksi aktif PPPoE.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
