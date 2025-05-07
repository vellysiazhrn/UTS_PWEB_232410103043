<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PageController extends Controller
{  
    public function showLogin()
    {
        return view('login'); 
    }

    public function handleLogin(Request $request)
    {
        $username = $request->input('username');
    
        $username = Session::get('username');
    
        return redirect()->route('dashboard');
    }
    

    public function dashboard()
    {
        $username = Session::get('username');

        $stats = [
            'orders' => 3,
            'newOrders' => 2,
            'activeProjects' => 2,
            'dueThisWeek' => 1,
            'yarnStock' => 3,
            'lowStockItems' => 1,
            'monthlyRevenue' => 150000,
            'revenueChange' => 12.5
        ];

        $projects = [
            [
                'name' => 'Ganci Amigurumi Kaktus',
                'status' => 'Proses',
                'due' => '2025-05-10',
                'progress' => 60
            ],
            [
                'name' => 'Ganci Amigurumi Nailong',
                'status' => 'Selesai',
                'due' => '2025-05-5',
                'progress' => 100
            ],
            [
                'name' => 'Ganci Amigurumi Bebek Topi Katak',
                'status' => 'Not Started',
                'due' => '2025-05-15',
                'progress' => 0
            ]
        ];

        $materials = [
            ['name' => 'Benang Milk Cotton Ivory', 'type' => 'yarn', 'stock' => 5],
            ['name' => 'Benang Milk Cotton Kuning', 'type' => 'yarn', 'stock' => 20],
            ['name' => 'Benang Milk Cotton Putih', 'type' => 'yarn', 'stock' => 0],
        ];

        $deadlines = [
            ['title' => 'Ganci Amigurumi Kaktus', 'due' => '2025-05-10'],
            ['title' => 'Ganci Amigurumi Bebek Topi Katak', 'due' => '2025-05-15'],
        ];

        $salesData = [50000, 70000, 60000, 80000, 90000];

        return view('dashboard', compact('username', 'stats', 'projects', 'materials', 'deadlines', 'salesData'));
    }

    public function pengelolaan()
    {
        $bahan = [
            ['nama' => 'Benang Milk Cotton Kuning', 'kategori' => 'Wol', 'warna' => 'Merah', 'stok' => 20, 'status' => 'Tersedia'],
            ['nama' => 'Benang Milk Cotton Ivory', 'kategori' => 'Katun', 'warna' => 'Biru', 'stok' => 5, 'status' => 'Hampir Habis'],
            ['nama' => 'Benang Milk Cotton Putih', 'kategori' => 'Akrilik', 'warna' => 'Hitam', 'stok' => 0, 'status' => 'Habis'],
        ];

        $proyek = [
            ['nama' => 'Ganci Amigurumi Kaktus', 'status' => 'Proses'],
            ['nama' => 'Ganci Amigurumi Nailong', 'status' => 'Selesai'],
            ['nama' => 'Ganci Amigurumi Bebek Topi Katak', 'status' => 'Menunggu'],
        ];

        $pesanan = [
            ['customer' => 'Tata', 'produk' => 'Ganci Amigurumi Kaktus', 'deadline' => '2025-05-10', 'status' => 'Proses', 'catatan' => 'yang bentuk love sama bulat'],
            ['customer' => 'Wahyu', 'produk' => 'Ganci Amigurumi Nailong', 'deadline' => '2025-05-05', 'status' => 'Selesai', 'catatan' => 'yang bagus'],
            ['customer' => 'Feby', 'produk' => 'Ganci Amigurumi Bebek Topi Katak', 'deadline' => '2025-05-15', 'status' => 'Proses', 'catatan' => '-'],
        ];

        return view('pengelolaan', compact('bahan', 'proyek', 'pesanan'));
    }

    public function profile()
    {
        $username = session('username', 'Guest');
        return view('profile', compact('username'));
    }

    public function logout()
    {
        session()->forget('username');
        return redirect('/');
    }
}
