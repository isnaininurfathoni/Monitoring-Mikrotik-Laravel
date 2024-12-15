@extends('layout.template')

@section('title', 'Edit User')
@section('content')

<div class="mb-3">
    <a href="{{ url('role-management') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
</div>
<form action='{{ url('role-management/'.$data->name) }}' method='post'>
  @if ($errors->any())
  <div class="alert alert-danger bg-red-500 text-white p-4 rounded mb-4">
      <ul>
          @foreach ($errors->all() as $item)
              <li>{{ $item }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @csrf
  @method('PUT')
  <div class="my-3 p-4 bg-white rounded-lg shadow-lg">
      <div class="mb-3 flex justify-between items-center">
          <label for="name" class="text-sm font-semibold">Name</label>
          <div class="flex-1">
              {{ $data->name }}
          </div>
      </div>
      <div class="mb-3 flex justify-between items-center">
          <label for="email" class="text-sm font-semibold">Email</label>
          <div class="flex-1">
              {{ $data->email }}
          </div>
      </div>
      <div class="mb-3 flex justify-between items-center">
          <label for="password" class="text-sm font-semibold">Password</label>
          <div class="flex-1">
              {{ $data->password }}
          </div>
      </div>
      <div class="mb-3 flex justify-between items-center">
          <label for="role" class="text-sm font-semibold">Role</label>
          <div class="flex-1">
              <select class="form-select block w-full mt-1 px-4 py-2 border rounded-md" name="role" id="role">
                  <option value="teknisi" {{ $data->role == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                  <option value="administrator" {{ $data->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                  <option value="superuser" {{ $data->role == 'superuser' ? 'selected' : '' }}>Superuser</option>
              </select>
          </div>
      </div>
      <div class="mb-3 flex justify-end">
          <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">UPDATE</button>
      </div>
  </div>
</form>

@endsection
