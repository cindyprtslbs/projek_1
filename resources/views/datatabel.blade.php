@extends('myview.header')

@section('content')
<div class="container">
    <div class="card">

        <div class="card-body">
            <!-- Form Tambah User -->
            <div class="table-responsive mt-3">
            <button id="addUserBtn" class="btn btn-primary mb-3">Tambah User</button>

            <!-- Form Tambah User  -->
            <form id="addUserForm" class="table table-striped table-borderless" action="{{ route('admin.store') }}" method="POST" style="display: none;">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP:</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="guest">Guest</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_jenis_user">Jenis User:</label>
                    <select name="id_jenis_user" id="id_jenis_user" class="form-control">
                        @foreach($jenisUsers as $jenisUser)
                            <option value="{{ $jenisUser->id }}">{{ $jenisUser->jenis_user }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_user">Status User:</label>
                    <select name="status_user" id="status_user" class="form-control">
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                    </select>
                    {{-- <button id="statusButton" class="btn mt-2">
                        {{ $admin->status_user == 'active' ? 'Active' : 'Inactive' }}
                    </button> --}}
                </div>
                <button type="submit" class="btn btn-success">Simpan User</button>
            </form>
        </div>

                <style>
                    .btn-active {
                        background-color: green; /* Warna untuk tombol aktif */
                        color: white;
                        border: none; /* Menghilangkan border */
                        padding: 5px 10px; /* Padding untuk tampilan tombol */
                    }

                    .btn-inactive {
                        background-color: red; /* Warna untuk tombol tidak aktif */
                        color: white;
                        border: none; /* Menghilangkan border */
                        padding: 5px 10px; /* Padding untuk tampilan tombol */
                    }

                </style>

                <script>
                    function updateStatusButton() {
                        var statusSelect = document.getElementById('status_user');
                        var statusButton = document.getElementById('statusButton');

                        // Mengubah teks dan kelas tombol berdasarkan pilihan
                        if (statusSelect.value === 'active') {
                            statusButton.textContent = 'Active';
                            statusButton.className = 'btn btn-active btn-sm mt-2';
                        } else {
                            statusButton.textContent = 'Inactive';
                            statusButton.className = 'btn btn-inactive btn-sm mt-2';
                        }
                    }

                    // Panggil fungsi saat halaman dimuat untuk set status awal
                    document.addEventListener('DOMContentLoaded', function() {
                        updateStatusButton();
                    });
                </script>


            <!-- Alert jika ada success message -->
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

        <!-- Tabel Daftar User -->
        <h2 class="mt-5">Daftar User</h2>
        <div class="table-responsive mt-3">
            <table id="myTable" class="display nowrap" style="width: 100%">
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
                            <td>{{ $a->jenis_user->jenis_user }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.destroy', $a->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus user ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable with scroll and responsive features
        $('#myTable').DataTable({
            "scrollX": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
        });

        // Action on row click
        $('#myTable tbody').on('click', 'tr', function () {
            let table = $('#myTable').DataTable();
            let data = table.row(this).data();
            alert('You clicked on ' + data[1] + "'s row");
        });
    });

    // Toggle add user form and handle form submission with AJAX
    $('#addUserBtn').click(function() {
        $('#addUserForm').toggle();
    });

    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#addUserForm').hide();
                alert('User berhasil ditambahkan!');
                location.reload();
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat menambah user: ' + xhr.responseText);
            }
        });
    });
</script>
@endsection
