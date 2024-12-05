@extends('myview.header')

@section('content')
    <div class="container">
        <h3>Daftar Jenis User</h3>
        <button href="{{ route('jenis-user.create') }}" class="btn btn-primary mb-3">Tambah Jenis User</button>

        <div class="table-responsive mt-3">
            <table id="myTable" class="table table-striped table-bordered dataTable" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Jenis User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenisUsers as $jenisUser)
                        <tr>
                            <td>{{ $jenisUser->id }}</td>
                            <td>{{ $jenisUser->jenis_user }}</td>
                            <td>
                                <a href="{{ route('jenis-user.edit', $jenisUser->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('jenis-user.destroy', $jenisUser->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>

    <!-- Link CSS DataTables dan DataTables Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

    <!-- Link JS DataTables dan DataTables Buttons -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
@endsection
