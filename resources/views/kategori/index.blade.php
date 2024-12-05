@extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2>Daftar Kategori</h2>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kate)
                                <tr>
                                    <td>{{ $kate->id }}</td>
                                    <td>{{ $kate->nama }}</td>
                                    <td>
                                        <form action="{{ route('kategori.destroy', $kate->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <div class="wrapper text-center">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus buku ini?')">Delete</button>
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
@endsection


