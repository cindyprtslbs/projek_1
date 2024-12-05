@extends('myview.header')

@section('content')
<div class="container">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="col-md-12 grid-margin">
            </div>
        </div>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Stock Dashboard</title>
            <!-- Tailwind CSS -->
            <script src="https://cdn.tailwindcss.com"></script>
            <!-- ApexCharts -->
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script> --}}
            <!-- jQuery -->
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
        </head>
        <body class="bg-gray-50">
            <div class="container mx-auto p-6">
                <!-- Header with Month Selection -->
                <div class="mb-6 flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">Stock Dashboard</h1>
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-500">Month and Year</span>
                        <form method="GET" action="{{ route('dashboard') }}">
                            <!-- Month Picker input -->
                            <input type="month" id="monthPicker" name="month" class="px-3 py-1 border rounded-lg"
                                   value="{{ request('DATE_TRANSACTION', $date) }}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>

                <!-- Metrics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-red-500 text-white rounded-lg shadow p-6">
                        <div class="text-3xl font-bold text-center" id="jumlahEmiten">{{ $jumlahEmiten }}</div>
                        <div class="text-sm text-center mt-2">Jumlah Emiten</div>
                    </div>
                    <div class="bg-blue-500 text-white rounded-lg shadow p-6">
                        <div class="text-3xl font-bold text-center" id="volumeTransaksi">{{ $totalVolume }}</div>
                        <div class="text-sm text-center mt-2">Volume Transaksi</div>
                    </div>
                    <div class="bg-purple-500 text-white rounded-lg shadow p-6">
                        <div class="text-3xl font-bold text-center" id="valueTransaksi">{{ $totalValue }}</div>
                        <div class="text-sm text-center mt-2">Value Transaksi</div>
                    </div>
                    <div class="bg-green-500 text-white rounded-lg shadow p-6">
                        <div class="text-3xl font-bold text-center" id="jumlahFrekuensi">{{ $totalFrequency }}</div>
                        <div class="text-sm text-center mt-2">Jumlah Frekuensi</div>
                    </div>
                </div>


                <!-- Table and Pie Chart -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Transaction Table -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Tabel Transaksi</h2>
                        <div class="overflow-x-auto">
                            {{-- <table class="min-w-full table-auto text-xs" id="transactionTable"> --}}
                                <table id="myTable" class="table table-striped table-borderless">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Stock Code</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date transaction :month</th>
                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">sum of volume</th>
                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">sum of value</th>
                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Frequency</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="px-4 py-2">{{ $item->STOCK_CODE }}</td>
                                                <td class="px-4 py-2">{{ $item->date_formatted }}</td>
                                                <td class="px-4 py-2 text-right">{{ number_format($item->total_volume) }}</td>
                                                <td class="px-4 py-2 text-right">{{ number_format($item->total_value) }}</td>
                                                <td class="px-4 py-2 text-right">{{ number_format($item->total_frequency) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Pie Value Transaksi</h2>
                        <div id="container"></div>
                    </div>
                </div>


                <!-- Bar Chart and Line Chart -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Bar Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Frekuensi Bulanan</h2>
                        <div id="barChart"></div>
                    </div>

                    <!-- Line Chart -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold mb-4">Grafik Harga Close</h2>
                        <div id="lineChart"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Laporan Transaksi SahamBulan Januari 2023</h2>
                <div class="overflow-x-auto">
                    {{-- <h3 class="text-xl font-semibold mb-4">{{ $monthYear }}</h3> --}}
                    <table  class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Stock Code</th>
                                <th>Sum of Volume</th>
                                <th>Sum of Value</th>
                                <th>Sum of Frequency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data4 as $item)
                                <tr>
                                    <td>{{ $item->STOCK_CODE }}</td>
                                    <td>{{ number_format($item->total_volume, 2) }}</td>
                                    <td>{{ number_format($item->total_value, 2) }}</td>
                                    <td>{{ number_format($item->total_frequency, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>


            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <script>
                Highcharts.chart('container', {
                    chart: {
                        type: 'pie'
                    },
                    tooltip: {
                        valueSuffix: '%'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: [{
                                enabled: true,
                                distance: 20
                            }, {
                                enabled: true,
                                distance: -40,
                                format: '{point.percentage:.1f}%',
                                style: {
                                    fontSize: '1.2em',
                                    textOutline: 'none',
                                    opacity: 0.7
                                },
                                filter: {
                                    operator: '>',
                                    property: 'percentage',
                                    value: 10
                                }
                            }]
                        }
                    },
                    series: [{
                        name: 'Percentage',
                        colorByPoint: true,
                        data: {!! json_encode($chartData) !!}
                    }]
                });
            </script>

            <script>
                Highcharts.chart('barChart', {
                    chart: {
                        type: 'column'
                    },
                    xAxis: {
                        categories: [
                            @foreach($data2 as $item)
                                '{{ $item->STOCK_CODE }}',
                            @endforeach
                        ],
                        crosshair: true,
                        accessibility: {
                            description: 'Emiten'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Volume, Value, Frequency'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' (Volume / Value / Frequency)'
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [
                        {
                            name: 'Volume',
                            data: [
                                @foreach($data2 as $item)
                                    {{ $item->total_volume }},
                                @endforeach
                            ]
                        },
                        {
                            name: 'Value',
                            data: [
                                @foreach($data2 as $item)
                                    {{ $item->total_value }},
                                @endforeach
                            ]
                        },
                        {
                            name: 'Frequency',
                            data: [
                                @foreach($data2 as $item)
                                    {{ $item->total_frequency }},
                                @endforeach
                            ]
                        }
                    ]
                });
            </script>

<script>
    Highcharts.chart('lineChart', {
        title: {
            text: 'Transaksi Harian per Emiten',
            align: 'left'
        },

        subtitle: {
            text: 'Source: Data Transaksi Emiten',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Harga Penutupan (CLOSE)'
            }
        },

        xAxis: {
            categories: [
                @foreach($groupedData->first() as $item)
                    '{{ \Carbon\Carbon::parse($item->DATE_TRANSACTION)->format('Y-m-d') }}',
                @endforeach
            ],
            accessibility: {
                rangeDescription: 'Range: Tanggal transaksi'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: Date.UTC(2010, 0, 1)  // Menyesuaikan titik awal berdasarkan tahun, bisa disesuaikan
            }
        },

        series: [
            @foreach($groupedData as $stockCode => $data)
                {
                    name: '{{ $stockCode }}',
                    data: [
                        @foreach($data as $item)
                            {{ $item->CLOSE }},
                        @endforeach
                    ]
                },
            @endforeach
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
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
        </body>
</div>
@endsection
