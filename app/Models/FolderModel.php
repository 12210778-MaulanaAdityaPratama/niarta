<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class FolderModel extends Model
{
    use HasFactory;

    protected $table = 'folder';
    protected $fillable = [
        'nama_folder',
        'ukuran',
        'perizinan_id',
    ];

    public function perizinan()
    {
        return $this->belongsTo(PerizinanModel::class, 'perizinan_id');
    }

    public function files()
    {
        return $this->hasMany(FileModel::class, 'folder_id');
    }
    public function getTotalUkuranFile()
    {
        // Mengambil total ukuran file dalam folder dan mengonversinya ke KB
        $totalUkuran = $this->files()->sum('ukuran') / 1024;
    
        return number_format($totalUkuran, 2) . ' KB';
    }
    public function deleteFolderAndFiles()
    {
        // Hapus semua file terkait di dalam folder
        $this->files->each(function ($file) {
            if ($file->path) {
                // Hapus file dari penyimpanan
                Storage::delete($file->path);
    
                // Hapus record file dari database
                $file->delete();
            }
        });
    
        // Hapus folder itu sendiri
        Storage::deleteDirectory("public/files/{$this->id}");
    
        // Hapus record folder dari database
        $this->delete();
    }
    
}
