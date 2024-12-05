@extends('myview.header')

@section('content')
<div class="container">
    <h1>Tambah Setting Menu User</h1>

    <form action="{{ route('setting_menu_user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="ID_JENIS_USER" class="form-label">Jenis User</label>
            <select name="ID_JENIS_USER" id="ID_JENIS_USER" class="form-select" required>
                <option value="" disabled selected>Pilih Jenis User</option>
                @foreach($jenisUsers as $jenisUser)
                    <option value="{{ $jenisUser->id }}">{{ $jenisUser->jenis_user }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="MENU_ID" class="form-label">Menu</label>
            <select name="MENU_ID" id="MENU_ID" class="form-select" required>
                <option value="" disabled selected>Pilih Menu</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
