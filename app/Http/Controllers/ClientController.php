<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function view_status()
    {
        # code...
        return view('client.status');
    }

    public function view_dashboard()
    {
        return view('client.home');
    }

    public function view_history()
    {
        $status = DB::table('orders as o')
            ->select(
                'o.id as id',
                'u.username as username',
                'o.alamat as alamat',
                'o.totalBayar as totalBayar',
                DB::raw('(CASE WHEN o.status = 1 THEN "Belum Dibayar"
                WHEN o.status = 2 THEN "Sedang Dikerjakan" 
                WHEN o.status = 3 THEN "Sudah Selesai" END) as status'),
                'o.updated_at as updated_at',
                'p.method as payment_id'
            )
            ->join('users as u', 'u.id', '=', 'o.user_id')
            ->join('payments as p', 'p.id', '=', 'o.payment_id')
            ->where('o.user_id', '=', auth()->user()->id)
            ->where('o.status', '=', 2)
            ->orderBy('id', 'asc')
            ->get();

        return view('client.history', compact('status'));
        // return view('client.history');
    }
    public function view_settings()
    {
        return view('client.settings');
    }

    // public function show()
    // {
    //     $status = Orders::get();
    //     return view('client.history', compact('status'));
    // }


    // public function getAllStatus()
    // {
    //     $status = DB::table('orders')
    //         ->select(
    //             'id as id',
    //             'u.username as username',
    //             'alamat as alamat',
    //             'totalBayar as totalBayar',
    //             DB::raw('(CASE WHEN status = 1 THEN "Belum Dibayar"
    //             WHEN status = 2 THEN "Sedang Dikerjakan" 
    //             WHEN status = 3 THEN "Sudah Selesai" END) as status')
    //         )
    //         ->join('users as u', 'u.id', '=', 'orders.user_id')
    //         ->orderBy('id', 'asc')
    //         ->get();

    //     return view('client.history', compact('status'));
    // }
}
