<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\topup;
use App\Models\produk;
use App\Models\wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\withdrawal;


class dashboardController extends Controller
{
    public function customerIndex()
    {
    $title = 'Dashboard';
    $wallet = wallet::where('id_user', auth()->user()->id)->first();
    return view('customer.index', compact('title', 'wallet'));
    }

    public function kantinIndex()
    {
        $title = 'Dashboard';
        $produks = produk::all();
        return view('kantin.index', compact('title', 'produks'));
    }

    public function bankIndex()
    {
        $title = 'Dashboard';
        $customers =User::where('role', 'customer')->get();
        $wallets = Wallet::all();
        $requestTopups = topup::where('status', 'menunggu')->get();
        $requestWithdrawals = withdrawal::where('status', 'menunggu')->get();
        return view('bank.index', compact('title', 'customers', 'wallets', 'requestTopups', 'requestWithdrawals'));
    }
}
