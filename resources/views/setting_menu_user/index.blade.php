@extends('myview.header')

@section('content')
<div class="container">
    <h1>Daftar Setting Menu User</h1>

    <a href="{{ route('setting_menu_user.create') }}" class="btn btn-primary">Tambah Setting Menu</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis User</th>
                <th>Menu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->NO_SETTING }}</td>
                <td>{{ $setting->jenisUser->jenis_user }}</td>
                <td>{{ $setting->menu->menu_name }}</td>
                <td>
                    <a href="{{ route('setting_menu_user.edit', $setting->NO_SETTING) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('setting_menu_user.destroy', $setting->NO_SETTING) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
