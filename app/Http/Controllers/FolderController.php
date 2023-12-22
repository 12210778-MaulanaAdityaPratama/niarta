<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FolderModel;
use App\Models\PerizinanModel;
class FolderController extends Controller
{
   
    public function tambah($perizinan_id)
    {
        // Mengambil data perizinan sesuai $perizinan_id
        $perizinan = PerizinanModel::findOrFail($perizinan_id);

        // Menampilkan formulir tambah folder dengan menyertakan data perizinan
        return view('perizinan.folder.tambah', compact('perizinan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_folder' => 'required',
            'perizinan_id' => 'required|exists:perizinan,id',
        ]);
    
        // Menghitung ukuran folder berdasarkan ukuran file-file yang ada di dalamnya
        $perizinan = PerizinanModel::findOrFail($request->input('perizinan_id'));
        $ukuranKB = $perizinan->folders()->withSum('files', 'ukuran')->first()->files_sum_ukuran ?? 0 / 1024;
    
        FolderModel::create([
            'nama_folder' => $request->input('nama_folder'),
            'ukuran' => $ukuranKB,
            'perizinan_id' => $request->input('perizinan_id'),
            // Set atribut lainnya sesuai dengan inputan formulir
        ]);
    
        return redirect()->route('perizinan.view', ['id' => $request->input('perizinan_id')])
            ->with('success', 'Folder berhasil ditambahkan');
    }
public function destroy($folder_id)
{
    $folder = FolderModel::findOrFail($folder_id);

    // Hapus folder dan file terkait
    $folder->deleteFolderAndFiles();

    return redirect()->route('perizinan.view', ['id' => $folder->perizinan_id])
        ->with('success', 'Folder dan file terkait berhasil dihapus');
}

}
