<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function view_order()
    {
        return view('client.order');
    }

    public function view_history()
    {
        return view('client.history');
    }
}
