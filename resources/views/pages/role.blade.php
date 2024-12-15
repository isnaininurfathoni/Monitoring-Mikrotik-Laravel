@extends('dashboard')

@section('title','Role Management')
@section('content')
  <!--FORM TAMBAH DATA-->
  <form action='{{ url('role-management') }}' method='post'>
    @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div id="successMessage" class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000);
        }
        });
    </script>
    @csrf
    @method('PUT')
    <div class="my-6 p-6 bg-white shadow rounded">
        <h3 class="text-lg font-bold mb-4">Tambah User</h3>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name :</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name='name' id="name" value="{{ old('name') }}">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
            <input type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name='email' id="email" value="{{ old('email') }}">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password :</label>
            <input type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name='password' id="password">
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role :</label>
            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="role" id="role">
                <option value="teknisi">Teknisi</option>
                <option value="administrator">Administrator</option>
                <option value="superuser">Superuser</option>
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">BUAT</button>
        </div>
      </form>
    </div>
    <!--AKHIR FORM TAMBAH DATA-->

    <!--FORM PENCARIAN-->
    <div class="my-6 p-6 bg-white shadow rounded">
         <div class="mb-4">
           <form class="flex" action="{{ url('role-management') }}" method="get">
               <input class="flex-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-2" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
               <button class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700" type="submit">Cari</button>
           </form>
         </div>
         <!--AKHIR FORM PENCARIAN-->

         <!--TABEL-->
         <h3 class="text-lg font-bold mb-4">Tabel User</h3>
         <table class="min-w-full divide-y divide-gray-200">
             <thead class="bg-gray-50">
                 <tr>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                 </tr>
             </thead>
             <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($data as $key => $item)     
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $key+ 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->role }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <a href='{{ url('role-management/'.$item->name.'/edit') }}' class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 text-sm">Edit</a>
                        <form onsubmit="return confirm('Apakah yakin untuk menghapus data?')" action="{{ url('role-management/'.$item->name) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700 text-sm">Del</button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
             </tbody>
         </table>
         <!--AKHIR TABEL-->
         <div class="mt-4">
             {{ $data->links() }}
         </div>
   </div>
@endsection
