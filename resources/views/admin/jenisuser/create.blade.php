@extends('myview.header')

@section('content')
    <div class="container">
        <h1>Tambah Jenis User</h1>

        <form action="{{ route('jenis-user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Jenis User</label>
                <input type="text" name="jenis_user" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

