<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerizinanModel;
use App\Models\FolderModel;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
class PerizinanController extends Controller
{
    public function index($jenis_usaha = null)
    {
        // dd($jenis_usaha); // Tambahkan ini untuk memeriksa nilai $jenis_usaha
        $perizinan = PerizinanModel::when($jenis_usaha, function ($query) use ($jenis_usaha) {
            return $query->where('jenis_usaha', $jenis_usaha);
        })->get();
        
        return view('perizinan.index', compact('perizinan', 'jenis_usaha'));
    }
    public function tambah() {
       
        $perizinan = new PerizinanModel();
        return view('perizinan.tambah', compact('perizinan'));
    }
    public function store(Request $request) {
        $request->validate([
            'jenis_usaha' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'lokasi' => 'required',
            'golongan' => 'required',
            'komoditas' => 'required',
            'luas' => 'required',
            'email' => 'required|email',
        ]);
        
        PerizinanModel::create($request->all());
        return redirect()->route('perizinan')->with('success','data berhasil ditambahkan');
        
    }
    public function view($perizinan_id)
    {
        $perizinan = PerizinanModel::findOrFail($perizinan_id);
        $folders = $perizinan->folders;

        return view('perizinan.view', compact('perizinan', 'folders'));
    }
    public function destroy($folder_id)
{
    $folder = FolderModel::findOrFail($folder_id);

    // Hapus folder dan file terkait
    $folder->deleteFolderAndFiles();

    return redirect()->route('perizinan.view', ['id' => $folder->perizinan_id])
        ->with('success', 'Folder dan file terkait berhasil dihapus');
}
public function hapus($perizinan_id)
    {
        $perizinan = PerizinanModel::findOrFail($perizinan_id);

        // Hapus semua folder dan file terkait
        foreach ($perizinan->folders as $folder) {
            $folder->deleteFolderAndFiles();
        }

        // Hapus data perizinan
        $perizinan->delete();

        return redirect()->route('perizinan')->with('success', 'Data perizinan berhasil dihapus');
    }
    public function edit($perizinan_id)
    {
        $perizinan = PerizinanModel::findOrFail($perizinan_id);

        return view('perizinan.edit', compact('perizinan'));
    }
    public function update(Request $request, $perizinan_id)
    {
        $request->validate([
            'jenis_usaha' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'lokasi' => 'required',
            'golongan' => 'required',
            'komoditas' => 'required',
            'luas' => 'required',
            'email' => 'required|email',
        ]);

        $perizinan = PerizinanModel::findOrFail($perizinan_id);
        $perizinan->update($request->all());

        return redirect()->route('perizinan.view', $perizinan_id)->with('success', 'Data perizinan berhasil diperbarui');
    }
}
