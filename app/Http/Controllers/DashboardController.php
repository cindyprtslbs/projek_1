<?php

namespace App\Http\Controllers;

use App\Models\transaksi_harian;
use App\Models\Emiten;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class DashboardController extends Controller
{
    // Fungsi untuk memformat angka
    private function formatNumber($value)
    {
        if ($value >= 1000000000000) {
            // Triliun
            return number_format($value / 1000000000000, 2) . ' T';
        } elseif ($value >= 1000000000) {
            // Billion
            return number_format($value / 1000000000, 2) . ' B';
        } elseif ($value >= 1000000) {
            // Million
            return number_format($value / 1000000, 2) . ' M';
        } elseif ($value >= 1000) {
            // Thousand
            return number_format($value / 1000, 2) . ' Ribu';
        } else {
            return number_format($value, 0);
        }
    }

    public function index(Request $request)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $menus = Menu::all();
        $emitens = Emiten::all();
        $transaksiHarians = transaksi_harian::all();
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $date = $request->input('date', $currentDate);



        $data = DB::table('emitens')
            ->leftJoin('transaksi_harians', 'emitens.STOCK_CODE', '=', 'transaksi_harians.STOCK_CODE')
            ->select(
                'emitens.STOCK_CODE',
                DB::raw("DATE_FORMAT(transaksi_harians.DATE_TRANSACTION, '%M') as date_formatted"),
                DB::raw('SUM(transaksi_harians.VOLUME) as total_volume'),
                DB::raw('SUM(transaksi_harians.VALUE) as total_value'),
                DB::raw('SUM(transaksi_harians.FREQUENCY) as total_frequency')
            )
            ->groupBy('emitens.STOCK_CODE', DB::raw("DATE_FORMAT(transaksi_harians.DATE_TRANSACTION, '%M')"))
            ->get();

            $data2 = transaksi_harian::selectRaw(
                'transaksi_harians.STOCK_CODE,
                SUM(transaksi_harians.VOLUME) as total_volume,
                SUM(transaksi_harians.VALUE) as total_value,
                SUM(transaksi_harians.FREQUENCY) as total_frequency')
                ->join('emitens', 'transaksi_harians.STOCK_CODE', '=', 'emitens.STOCK_CODE') // Join dengan tabel emitens berdasarkan STOCK_CODE
                ->groupBy('transaksi_harians.STOCK_CODE')
                ->get();

                $data4 = DB::table('emitens')
                ->leftJoin('transaksi_harians', 'emitens.STOCK_CODE', '=', 'transaksi_harians.STOCK_CODE')
                ->select(
                    'emitens.STOCK_CODE',
                    DB::raw('SUM(transaksi_harians.VOLUME) as total_volume'),
                    DB::raw('SUM(transaksi_harians.VALUE) as total_value'),
                    DB::raw('SUM(transaksi_harians.FREQUENCY) as total_frequency')
                )
                ->whereRaw('MONTH(transaksi_harians.DATE_TRANSACTION) = 1')
                ->groupBy('emitens.STOCK_CODE')
                ->get();



        // Prepare chart data
        $chartData = $data2->map(function ($item) {
            return [
                'name' => $item->STOCK_CODE,
                'y' => (float) $item->total_value,
            ];
        });

        $totalVolume = $chartData->sum('y');

        $chartData = $chartData->map(function ($item) use ($totalVolume) {
            $item['y'] = ($item['y'] / $totalVolume) * 100;
            return $item;
        });


        $data3 = transaksi_harian::select('STOCK_CODE', 'DATE_TRANSACTION', 'CLOSE')
                            ->orderBy('DATE_TRANSACTION')
                            ->get();

        // Kelompokkan data berdasarkan STOCK_CODE
        $groupedData = $data3->groupBy('STOCK_CODE');


        // Menghitung jumlah emiten
        $jumlahEmiten = Emiten::count();

        // Menghitung total keseluruhan volume, value, dan frekuensi dari Transaksi Harian
        $totalData = transaksi_harian::selectRaw('
                            SUM(VOLUME) as total_volume,
                            SUM(VALUE) as total_value,
                            SUM(FREQUENCY) as total_frequency
                        ')->first();

        // Mengirim data ke view dengan format angka yang sesuai
        return view('dashboard', [
            'jumlahEmiten' => $jumlahEmiten,
            'totalVolume' => $this->formatNumber($totalData->total_volume),
            'totalValue' => $this->formatNumber($totalData->total_value),
            'totalFrequency' => $this->formatNumber($totalData->total_frequency),
            'menus' => $menus,
            'emitens' => $emitens,
            'transaksiHarians' => $transaksiHarians,
            'data' => $data,
            'chartData' => $chartData,
            'month' => $month,
            'date' => $date,
            'data2' => $data2,
            'groupedData' => $groupedData,
            'data3' => $data3,
            'data4' => $data4
        ]);
    }
}
