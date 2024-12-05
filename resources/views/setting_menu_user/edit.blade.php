@extends('myview.header')

@section('content')
<div class="container">
    <h1>Edit Setting Menu User</h1>

    <!-- Menampilkan pesan sukses atau error -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('setting_menu_user.update', $settings->NO_SETTING) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ID_JENIS_USER">Jenis User:</label>
            <select name="ID_JENIS_USER" id="ID_JENIS_USER" class="form-control">
                @foreach ($jenisUsers as $jenisUser)
                    <option value="{{ $jenisUser->id }}" {{ $jenisUser->id == $settings->ID_JENIS_USER ? 'selected' : '' }}>
                        {{ $jenisUser->jenis_user }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="MENU_ID">Menu:</label>
            <select name="MENU_ID" id="MENU_ID" class="form-control">
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}" {{ $menu->id == $settings->MENU_ID ? 'selected' : '' }}>
                        {{ $menu->menu_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('setting_menu_user.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
