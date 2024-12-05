@extends('myview.header')

@section('content')
<div class="container">
    <h3>Setting Menu untuk {{ $jenis_user->role }}</h3>

    <form method="POST" action="{{ route('menu.updateAccess', $jenis_user->id) }}">
        @csrf
        @method('PUT')

        @foreach($menu as $item)
            <div class="form-check">
                <input type="checkbox" name="menu_id[]" value="{{ $item->id }}"
                >
                {{ $item->menu_name }}
            </div>
        @endforeach

        <button type="submit">Update Akses Menu</button>
    </form>
</div>
@endsection
