@extends('dashboard')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Interface List</h1>
    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">MAC Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TX Rate</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RX Rate</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comment</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($interfaces as $interface)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $interface['name'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $interface['type'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $interface['mac-address'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @if (isset($interface['running']) && $interface['running'] === 'true')
                                <span class="text-green-600 font-bold">Running</span>
                            @else
                                <span class="text-red-600 font-bold">Stopped</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $interface['tx-byte'] ?? '0' }} bytes</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $interface['rx-byte'] ?? '0' }} bytes</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $interface['comment'] ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada interface yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
