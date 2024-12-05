{{-- @extends('myview.header')

@section('content')
<div class="container">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-3">

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

                    <style>
                        .important { font-weight: bold; font-size: xx-large; }
                        .blue { color: blue; }
                        .error { color: red; font-weight: bold; }
                    </style>

                    <h3>Informasi Cuaca</h3>
                    <button id="loadData" class="btn btn-outline-primary btn-fw">Lihat Berita Cuaca</button>

                    <table id="cuaca" style="display:none;">
                        <tr>
                            <th>Informasi</th>
                            <th>Detail</th>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><span id="utc_datetime"></span></td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td><span id="local_datetime"></span></td>
                        </tr>
                        <tr>
                            <td>Date Time</td>
                            <td><span id="t"></span></td>
                        </tr>
                        <tr>
                            <td>Coordinates</td>
                            <td><span id="hu"></span></td>
                        </tr>
                        <tr>
                            <td>Lintang</td>
                            <td><span id="weather_desc"></span></td>
                        </tr>
                        <tr>
                            <td>Bujur</td>
                            <td><span id="weather_desc_en"></span></td>
                        </tr>
                        <tr>
                            <td>Magnitude</td>
                            <td><span id="ws"></span></td>
                        </tr>
                        <tr>
                            <td>Kedalaman</td>
                            <td><span id="wd"></span></td>
                        </tr>
                        <tr>
                            <td>Wilayah</td>
                            <td><span id="tcc"></span></td>
                        </tr>
                        <tr>
                            <td>Potensi</td>
                            <td><span id="vs_text"></span></td>
                        </tr>
                        <tr>
                            <td>Dirasakan</td>
                            <td><span id="analysis_date"></span></td>
                        </tr>
                    </table>

                    <h1 id="result"></h1>
                    <div id="error-message" class="error"></div> <!-- Elemen untuk menampilkan pesan kesalahan -->

                    <script>
                        $(document).ready(function() {
                            $('#loadData').click(function() {
                                $('#cuaca').slideToggle();
                                $('#error-message').html(''); // Menghapus pesan kesalahan sebelumnya

                                // Ganti {kode_wilayah_tingkat_iv} dengan kode wilayah yang sesuai
                                const kodeWilayah = '12345'; // Contoh kode wilayah
                                const url = `https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4=12`;

                                $.ajax({
                                    url: url,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data && data.Infocuaca && data.Infocuaca.cuaca) {
                                            const cuaca = data.Infocuaca.cuaca;
                                            console.log(cuaca);

                                            $('#utc_datetime').html(cuaca.DateTime);
                                            $('#local_datetime').html(cuaca.LokalDateTime);
                                            $('#t').html(cuaca.t);
                                            $('#hu').html(cuaca.hu);
                                            $('#weather_desc').html(cuaca.weather_desc);
                                            $('#weather_desc_en').html(cuaca.weather_desc_en);
                                            $('#ws').html(cuaca.ws);
                                            $('#wd').html(cuaca.wd);
                                            $('#tcc').html(cuaca.tcc);
                                            $('#vs_text').html(cuaca.vs_text);
                                            $('#analysis_date').html(cuaca.analysis);

                                            // Menghapus tombol setelah data dimuat
                                            $('#loadData').hide();
                                        } else {
                                            $('#error-message').html('Data cuaca tidak tersedia');
                                        }
                                    },
                                    error: function() {
                                        $('#result').html(''); // Menghapus konten hasil sebelumnya
                                        $('#error-message').html('Terjadi kesalahan dalam memuat data'); // Menampilkan pesan kesalahan
                                    }
                                });
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
