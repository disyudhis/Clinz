<?php

namespace App\Http\Controllers\Client;

use App\Models\Orders;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
                'warnaPakaian' => ['required', 'numeric'],
                'paketPewangi' => ['required', 'numeric'],
            ],
            [
                'warnaPakaian' => 'Pilih warna pakaianmu!',
                'paketPewangi' => 'Pilih jenis pewangi!'
            ]
        );

        $detail = new DetailOrder;
        $order = new Orders;

        $totalBayar = 0;
        if ($request->warnaPakaian == 1) {
            $detail->totalBayar = ($request->jumlahAtasan * 200) + ($request->jumlahBawahan * 200);
            if ($request->paketPewangi == 1) {
                $totalBayar = $detail->totalBayar = ($request->jumlahAtasan * 100) + ($request->jumlahBawahan * 100);
                // return $totalBayar;
            } else if ($request->paketPewangi == 2) {
                $totalBayar = $detail->totalBayar = ($request->jumlahAtasan * 300) + ($request->jumlahBawahan * 300);
                // return $totalBayar;
            } else if ($request->paketPewangi == 3) {
                $totalBayar = $detail->totalBayar = ($request->jumlahAtasan * 500) + ($request->jumlahBawahan * 500);
                // return $totalBayar;
            }
        } else if ($request->warnaPakaian == 2) {
            $detail->totalBayar = ($request->jumlahAtasan * 100) + ($request->jumlahBawahan * 100);
            if ($request->paketPewangi == 1) {
                $totalBayar = $detail->totalBayar = ($request->jumlahAtasan * 100) + ($request->jumlahBawahan * 100);
                // return $totalBayar;
            } else if ($request->paketPewangi == 2) {
                $totalBayar = $detail->totalBayar = ($request->jumlahAtasan * 300) + ($request->jumlahBawahan * 300);
                // return $totalBayar;
            } else if ($request->paketPewangi == 3) {
                $totalBayar = $detail->totalBayar = ($request->jumlahAtasan * 500) + ($request->jumlahBawahan * 500);
                // return $totalBayar;
            }
        }

        $order->user_id = auth()->user()->id;
        $order->jumlahAtasan = $request->jumlahAtasan;
        $order->jumlahBawahan = $request->jumlahBawahan;
        $order->warnaPakaian = $request->warnaPakaian;
        $order->paketPewangi = $request->paketPewangi;
        $detail->totalBayar = $totalBayar;
        $order->save();
        $detail->save();

        // return view('client.pengiriman');
        return redirect()->route('pengiriman')->with('status', 'Pesanan berhasil');
    }
}
