<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerizinanModel;
use App\Models\FolderModel;

class UserPerizinanController extends Controller
{
    public function index($jenis_usaha = null)
    {
        // dd($jenis_usaha); // Tambahkan ini untuk memeriksa nilai $jenis_usaha
        $perizinan = PerizinanModel::when($jenis_usaha, function ($query) use ($jenis_usaha) {
            return $query->where('jenis_usaha', $jenis_usaha);
        })->get();
        
        return view('user.perizinan.index', compact('perizinan', 'jenis_usaha'));
    }
    public function view($perizinan_id)
    {
        $perizinan = PerizinanModel::findOrFail($perizinan_id);
        $folders = $perizinan->folders;

        return view('user.perizinan.view', compact('perizinan', 'folders'));
    }
}
