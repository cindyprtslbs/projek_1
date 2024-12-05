@extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h2>Tambah Menu</h1>

                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="menu_name">Nama Menu</label>
                        <input class="form-control" type="text" id="menu_name" name="menu_name" required>
                    </div>
                    <div class="form-group">
                        <label for="menu_link">Link Menu</label>
                        <input class="form-control" type="text" id="menu_link" name="menu_link" required>
                    </div>
                    <div class="form-group">
                        <label for="menu_icon">Icon Menu</label>
                        <input class="form-control" type="text" id="menu_icon" name="menu_icon" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input class="form-control" type="text" id="level" name="level" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent_ID</label>
                        <input class="form-control" type="text" id="parent_id" name="parent_id" required>
                    </div>

                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


