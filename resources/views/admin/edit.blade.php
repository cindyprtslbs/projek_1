@extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <h2>Edit User</h2>
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Field Name -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{ $admin->name }}" required>
                    </div>

                    <!-- Field Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                    </div>

                    <!-- Field No HP -->
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $admin->no_hp }}" required>
                    </div>

                    <!-- Field Jenis User -->
                    <div class="form-group">
                    <label for="id_jenis_user">Jenis User:</label>
                    <select name="id_jenis_user" id="id_jenis_user" class="form-control">
                        @foreach($jenisUsers as $jenisUser)
                            <option value="{{ $jenisUser->id }}">{{ $jenisUser->jenis_user }}</option>
                        @endforeach
                    </select>
                </div>

                    <!-- Field Role -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="guest" {{ $admin->role == 'guest' ? 'selected' : '' }}>User</option>
                            <option value="mahasiswa" {{ $admin->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        </select>
                    </div>

                    <!-- Field Status User -->
                    <div class="form-group">
                    <label for="status_user">Status User</label>
                    <select name="status_user" id="status_user" class="form-control" required onchange="updateStatusButton()">
                        <option value="active" {{ $admin->status_user == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $admin->status_user == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>





                    <button type="submit" class="btn btn-success">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
