<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-gray-700 text-center mb-6">Register</h1>
        <form action="/register/create" method="POST">
            @csrf
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input 
                    type="name" 
                    id="name" 
                    name="name" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded-lg text-gray-700 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                    Register
                </button>
            </div>

            <!-- Additional Links -->
            <div class="text-center">
                <a href="/login" class="text-sm text-blue-500 hover:underline">Back to login</a>
            </div>
        </form>
    </div>
</body>
</html>