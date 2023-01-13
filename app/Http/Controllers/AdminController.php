<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function update_order(Request $request, Orders $order)
    {
        $request->validate([
            'statusPesanan' => ['required', 'gt:0']
        ]);
        $order->update([
            'statusPesanan' => $request->statusPesanan
        ]);
        return view('');
    }

    public function delete_order($id)
    {
        $order = DB::table('Orders')->where('id', $id)->delete();
        return redirect('');
    }

    public function update_user(Request $request, User $user)
    {
        $request->validate([
            'username' => $request->username,
            'noTelp' => $request->noTelp,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }

    public function delete_user($id)
    {
        $user = DB::table('user')->where('id', $id)->delete();
        return redirect('');
    }
}
