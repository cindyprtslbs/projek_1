@extends('myview.header')

@section('content')
    <div class="container">
        <h1>Edit Jenis User</h1>

        <form action="{{ route('jenis-user.update', $jenisUser->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Jenis User</label>
                <input type="text" name="name" class="form-control" value="{{ $jenisUser->jenis_user }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
