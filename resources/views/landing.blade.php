@extends('layout.template')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-lg font-bold text-gray-700">
                Welcome
            </div>
            <div class="flex items-center space-x-4">
                <a href="/login" class="text-gray-700 hover:text-gray-900">About</a>
                <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Welcome,Say Hi</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="text-2xl font-bold text-gray-700">150</div>
                <div class="text-sm text-gray-500">Users</div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="text-2xl font-bold text-gray-700">75</div>
                <div class="text-sm text-gray-500">Posts</div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="text-2xl font-bold text-gray-700">25</div>
                <div class="text-sm text-gray-500">Comments</div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="mt-8 bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Activity</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <p class="text-gray-700">John Doe commented on a post.</p>
                        <p class="text-sm text-gray-500">2 hours ago</p>
                    </div>
                    <button class="text-blue-500 hover:underline">View</button>
                </li>
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <p class="text-gray-700">Jane Smith created a new post.</p>
                        <p class="text-sm text-gray-500">5 hours ago</p>
                    </div>
                    <button class="text-blue-500 hover:underline">View</button>
                </li>
                <li class="py-4 flex justify-between items-center">
                    <div>
                        <p class="text-gray-700">Alice updated her profile.</p>
                        <p class="text-sm text-gray-500">1 day ago</p>
                    </div>
                    <button class="text-blue-500 hover:underline">View</button>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection