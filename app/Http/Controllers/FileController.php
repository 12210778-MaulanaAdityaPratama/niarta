<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use App\Models\FolderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{
    public function index($folder_id)
{
    $folder = FolderModel::findOrFail($folder_id);

    // Mendapatkan daftar file untuk folder tertentu
    $query = FileModel::where('folder_id', $folder_id);

    // Memproses pencarian jika ada
    $search = request('search');
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_file', 'like', '%' . $search . '%');
        });
    }

    $files = $query->get();

    return view('perizinan.folder.file.index', compact('folder', 'files'));
}
    public function tambah($folder_id)
    {
        $folder = FolderModel::findOrFail($folder_id);
        return view('perizinan.folder.file.tambah', compact('folder'));
    }
    public function store(Request $request, $folder_id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:10240', // Hanya izinkan file PDF dan Word dengan ukuran maksimal 10MB
        ]);
    
        $uploadedFile = $request->file('file');
        
        // Membuat nama file unik berdasarkan timestamp
        $namaFile = time() . '_' . $uploadedFile->getClientOriginalName();
    
        // Simpan file ke penyimpanan lokal (storage/app/public)
        $path = $uploadedFile->storeAs('public/files', $namaFile);
    
        // Konversi ukuran file ke kilobyte
        $ukuranKB = ceil($uploadedFile->getSize() / 1024);
    
        // Buat record baru untuk file dalam database
        FileModel::create([
            'nama_file' => $namaFile,
            'ukuran' => $ukuranKB,
            'path' => $path,
            'folder_id' => $folder_id,
        ]);
    
        return redirect()->route('file.index', ['folder_id' => $folder_id])
            ->with('success', 'File berhasil ditambahkan');
    }
    public function download($file_id)
{
    $file = FileModel::findOrFail($file_id);

    // Mendapatkan path lengkap ke file
    $filePath = storage_path("app/public/files/{$file->nama_file}");
    // Membangun response untuk download file
    return response()->download($filePath, $file->nama_file);
}
public function destroy($file_id)
{
    $file = FileModel::findOrFail($file_id);

    // Hapus file dari penyimpanan
    Storage::delete("public/files/{$file->nama_file}");

    // Hapus record file dari database
    $file->delete();

    return redirect()->back()->with('success', 'File berhasil dihapus');
}
}
