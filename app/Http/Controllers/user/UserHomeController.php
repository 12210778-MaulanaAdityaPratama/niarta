<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerizinanModel;


class UserHomeController extends Controller
{
    public function index($jenis_usaha = null)
    {
        // Jika jenis_usaha tidak ditentukan, tampilkan semua data
        // Jika jenis_usaha ditentukan, redirect ke halaman perizinan dengan filter jenis_usaha
        if ($jenis_usaha) {
            return $this->redirectToPerizinan($jenis_usaha);
        }
    
        $perizinan = PerizinanModel::all();
        return view('user.home', compact('perizinan', 'jenis_usaha'));
    }
    public function redirectToPerizinan($jenis_usaha)
{
    // Cek apakah jenis_usaha valid, jika tidak, kembalikan ke halaman beranda
    if (!in_array($jenis_usaha, ['PL_RUTIN', 'PN_IUP', 'PJ_IUP'])) {
        return redirect()->route('user.home');
    }

    // Redirect ke halaman perizinan dengan filter jenis_usaha
    return redirect()->route('user.perizinan', ['jenis_usaha' => $jenis_usaha]);
}
}
