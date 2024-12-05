@extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <div>
                        <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
                    </div>
                    <h2>Menu</h2>
                    <table id="myTable" class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Menu Name</th>
                                <th>Menu Link</th>
                                <th>Menu Icon</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->menu_name }}</td>
                                    <td>{{ $menu->menu_link }}</td>
                                    <td>{{ $menu->menu_icon }}</td>
                                    <td>{{ $menu->id_level }}</td>
                                    <td>
                                        <div class="wrapper text-center">
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="mdi mdi-border-color" type="button" title="Edit"></a>
                                        </div>
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="wrapper text-center">
                                                <button type="submit" class="mdi mdi-delete" title="Delete"></button>
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
<script>
    $(document).ready(function () {
        // Inisialisasi DataTable
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    </script>
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


