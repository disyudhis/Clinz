<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'jumlahAtasan' => ['required', 'max:255'],
                'jumlahBawahan' => ['required', 'max:255'],
                'warnaPakaian' => ['required', 'numeric'],
                'paketPewangi' => ['required', 'numeric'],
                'regionId' => ['required', 'numeric'],
                'alamat' => ['required', 'string'],
                // 'totalBayar' => ['required'],
                'paymentId' => ['required'],
            ],
        );

        $order = Orders::create([
            'jumlahAtasan' => $request->jumlahAtasan,
            'jumlahBawahan' => $request->jumlahBawahan,
            'warnaPakaian' => $request->warnaPakaian,
            'paketPewangi' => $request->paketPewangi,
            'regionId' => $request->regionId,
            'alamat' => $request->alamat,
            'totalBayar' => $request->totalBayar,
            'paymentId' => $request->paymentId,
        ]);

        $orders = Orders::paginate();

        return view('client.status', compact('orders'));
    }
}
