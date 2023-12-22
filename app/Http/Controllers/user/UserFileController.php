<?php

namespace App\Http\Controllers\user;

use App\Models\FileModel;
use App\Models\FolderModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFileController extends Controller
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
    
        return view('user.perizinan.folder.file.index', compact('folder', 'files'));
    }
        public function download($file_id)
    {
        $file = FileModel::findOrFail($file_id);
    
        // Mendapatkan path lengkap ke file
        $filePath = storage_path("app/public/files/{$file->nama_file}");
        // Membangun response untuk download file
        return response()->download($filePath, $file->nama_file);
    }
}
