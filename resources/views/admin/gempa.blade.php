

@extends('myview.header')

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
</style>
<body>
{{--
Alamat IP : <input type="text" id="satu"> --}}
<h3>Informasi Gempa</h3>
<button id="loadData" class="btn btn-outline-primary btn-fw">Lihat Berita Gempa</button>
<table id="gempa">
    <tr>
        <th>Informasi</th>
        <th>Detail</th>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><span id="tanggal"></span></td>
    </tr>
    <tr>
        <td>Jam</td>
        <td><span id="Jam"></span></td>
    </tr>
    <tr>
        <td>Date Time</td>
        <td><span id="Datetime"></span></td>
    </tr>
    <tr>
        <td>Coordinates</td>
        <td><span id="Coordinates"></span></td>
    </tr>
    <tr>
        <td>Lintang</td>
        <td><span id="Lintang"></span></td>
    </tr>
    <tr>
        <td>Bujur</td>
        <td><span id="Bujur"></span></td>
    </tr>
    <tr>
        <td>Magnitude</td>
        <td><span id="Magnitude"></span></td>
    </tr>
    <tr>
        <td>Kedalaman</td>
        <td><span id="Kedalaman"></span></td>
    </tr>
    <tr>
        <td>Wilayah</td>
        <td><span id="Wilayah"></span></td>
    </tr>
    <tr>
        <td>Potensi</td>
        <td><span id="Potensi"></span></td>
    </tr>
    <tr>
        <td>Dirasakan</td>
        <td><span id="Dirasakan"></span></td>
    </tr>
    <tr>
        <td>Shakemap</td>
        <td><img id="Shakemap"></img></td>
    </tr>
</table>




<h1 id="result"></h1>

<script>
    $(document).ready(function() {
        $('#loadData').click(function() {

        $('#gempa').slideToggle();

            $.ajax({
                url: 'https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data = data.Infogempa.gempa;
                    console.log(data);
                    $('#tanggal').html(data.Tanggal);
                    $("#loadData").click(function(){
                        $("button").hide();
                    })
                    $("#loadData").click(function(){
                        $("button").show();
                    })
                    $('#Jam').html(data.Jam);
                    $('#Datetime').html(data.DateTime);
                    $('#Coordinates').html(data.Coordinates);
                    $('#Lintang').html(data.Lintang);
                    $('#Bujur').html(data.Bujur);
                    $('#Magnitude').html(data.Magnitude);
                    $('#Kedalaman').html(data.Kedalaman);
                    $('#Wilayah').html(data.Wilayah);
                    $('#Potensi').html(data.Potensi);
                    $('#Dirasakan').html(data.Dirasakan);
                    $('#Shakemap').attr('src', 'https://data.bmkg.go.id/DataMKG/TEWS/' + data.Shakemap);


                    // alert(data.ip);
                    // $('#satu').val(data.ip);
                    // $('#result').text(data.ip).addClass('blue');
                    // $('#result').html('<h2 style="color:red">'+data.ip+'</h2>');
                },
                error: function(error) {
                    $('#result').html('Terjadi kesalahan dalam memuat data');
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
@endsection


