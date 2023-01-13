<?php

namespace App\Http\Controllers\Client;

use App\Models\Orders;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{

    public function index()
    {
        return view('client.order');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'jumlahAtasan' => ['required', 'max:255'],
                'jumlahBawahan' => ['required', 'max:255'],
                // 'warnaPakaian' => ['required', 'numeric'],
                'paketPewangi' => ['required', 'numeric'],
            ],
            [
                // 'warnaPakaian' => 'Pilih warna pakaianmu!',
                'paketPewangi' => 'Pilih jenis pewangi!'
            ]
        );

        // $detail = new DetailOrder;
        $order = new Orders;

        $totalBayar = 0;
        if ($request->paketPewangi == 1) {
            $totalBayar = $order->totalBayar = ($request->jumlahAtasan * 500) + ($request->jumlahBawahan * 500);
            // return $totalBayar;
        } else if ($request->paketPewangi == 2) {
            $totalBayar = $order->totalBayar = ($request->jumlahAtasan * 800) + ($request->jumlahBawahan * 800);
            // return $totalBayar;
        } else if ($request->paketPewangi == 3) {
            $totalBayar = $order->totalBayar = ($request->jumlahAtasan * 1000) + ($request->jumlahBawahan * 1000);
            // return $totalBayar;
        }

        $order->user_id = auth()->user()->id;
        $order->jumlahAtasan = $request->jumlahAtasan;
        $order->jumlahBawahan = $request->jumlahBawahan;
        // $order->warnaPakaian = $request->warnaPakaian;
        $order->paketPewangi = $request->paketPewangi;
        $order->status = 1;
        $order->totalBayar = $totalBayar;
        $order->save();
        // $detail->save();

        // return view('client.pengiriman');
        return redirect()->route('view_status')->with('status', 'Pesanan berhasil');
    }

    public function show(Orders $order)
    {
        return view('client.pengiriman', compact('order'));
    }

    public function update(Request $request, Orders $order)
    {
        $request->validate(
            [
                'regionId' => ['required', 'numeric', 'gt:0'],
                'alamat' => ['required', 'max:255'],
                'payment_id' => ['required', 'numeric'],
            ],
            [
                'regionId.gt' => 'Pilih daerah terdekatmu!',
                'alamat' => 'Tulis alamat tujuanmu!',
                'payment_id' => 'Pilih metode pembayaran'
            ]
        );

        $order->update([
            'regionId' => $request->regionId,
            'alamat' => $request->alamat,
            'payment_id' => $request->payment_id,
            'status' => 2
        ]);

        return redirect()->route('view_status')->with('status', 'Pembayaran berhasil');
        // return view('client.status');
    }

    public function getAllStatus()
    {
        $order = DB::table('orders')
            ->select(
                'id as id',
                'alamat as alamat',
                DB::raw('(CASE WHEN regionId = 1 THEN "Cipagalo"
                WHEN regionId = 2 THEN "Bojongsoang"
                WHEN regionId = 3 THEN "Buah Batu"
                WHEN regionId = 4 THEN "Bojongloa"
                WHEN regionId = 5 THEN "Ciwastra"
                END) as regionId
                 '),
                'totalBayar as totalBayar',
                DB::raw('(CASE WHEN status = 1 THEN "Belum Dibayar"
                WHEN status = 2 THEN "Sedang Dikerjakan"
                WHEN status = 3 THEN "Selesai"
                END) as status
                 '),
                // 'jumlahSisa as jumlahSisa',
                // 'jumlahKeluar as jumlahKeluar',
            )
            ->orderBy('id', 'asc')
            ->get();

        return DataTables::of($order)
            ->addColumn('action', function ($order) {

                $btn = '<a type="button" href="' . url('/pengiriman') . "/" . $order->id . '" style="padding: 3px 20px" class="btn btn-primary">Bayar</a>';
                return $btn;
            })
            ->make(true);
    }
}
