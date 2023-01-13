<?php

namespace App\Http\Controllers\Client;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;

class DetailOrderController extends Controller
{
    public function index()
    {
        return view('client.pengiriman');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'daerah' => ['required', 'numeric', 'gt:0'],
                'alamat' => ['required', 'max:255'],
                'payments' => ['required', 'numeric'],
            ],
            [
                'daerah.gt' => 'Pilih daerah terdekatmu!',
                'alamat' => 'Tulis alamat tujuanmu!',
                'payments' => 'Pilih metode pembayaran'
            ]
        );

        // deklarasi model
        $order = new Orders;
        $detail = new DetailOrder;

        // mengambil order id
        $lastOrder = $order->id;

        // eloquent insert to database
        $detail->orderId = $lastOrder;
        $detail->regionId = $request->daerah;
        $detail->alamat = $request->alamat;
        $detail->paymentId = $request->payments;
        $detail->status = 1;
        // $detail->totalBayar = $totalBayar;
        $detail->save();


        return redirect()->route('view_status')->with('status', 'Pengiriman berhasil');
    }

    public function update(Request $request, Orders $detail)
    {
        $request->validate(
            [
                'daerah' => ['required', 'numeric', 'gt:0'],
                'alamat' => ['required', 'max:255'],
                'payments' => ['required', 'numeric'],
            ],
            [
                'daerah.gt' => 'Pilih daerah terdekatmu!',
                'alamat' => 'Tulis alamat tujuanmu!',
                'payments' => 'Pilih metode pembayaran'
            ]
        );

        $detail->update([
            'daerah' => $request->regionId,
            'alamat' => $request->alamat,
            'payments' => $request->paymentId,
            'status' => 1
        ]);

        return view('client.home');
    }
}
