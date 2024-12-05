{{-- @extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <h2>Daftar User</h2>
                <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah User</a>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Status User</th>
                                <th>Jenis User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->name }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>{{ $a->no_hp }}</td>
                                    <td>{{ $a->status_user }}</td>
                                    <td>{{ $a->role }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.destroy', $a->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <div class="wrapper text-center">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus user ini?')">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
