<!--Sidebar for Dashboard-->

@extends('landing')

@section('sidebar')
    
<div class="sidebar bg-gray-800 text-white p-6 min-h-screen">
    <h2 class="text-xl font-bold mb-6">Dashboard</h2>
    <div class="flex flex-col space-y-4">
        @if (Auth::user()->role == 'superuser')
            <a href="{{ url('/role-management') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-house-door-fill"></i>
                <span>Role Management</span>
            </a>
            <a href="{{ url('/customer') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-person-lines-fill"></i>
                <span>Customer</span>
            </a>
            <a href="{{ url('/finance') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-credit-card-fill"></i>
                <span>Finance</span>
            </a>
        @elseif (Auth::user()->role == 'administrator')
            <a href="{{ url('/dashboard') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('/customer') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-person-lines-fill"></i>
                <span>Customer</span>
            </a>
        @elseif (Auth::user()->role == 'teknisi')
            <a href="{{ url('/maps') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Maps</span>
            </a>
            <a href="{{ url('/help') }}" class="flex items-center space-x-2 text-gray-300 hover:text-white">
                <i class="bi bi-question-circle-fill"></i>
                <span>Help</span>
            </a>
        @endif

        <div class="mt-6">
            <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white text-center py-2 px-4 rounded w-full">Logout</a>
        </div>
    </div>
</div>
@endsection