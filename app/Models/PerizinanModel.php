<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FolderModel;
use App\Models\FileModel;
class PerizinanModel extends Model
{
    protected $table = 'perizinan';
    protected $fillable = [
        'jenis_usaha',
        'nama_perusahaan',
        'alamat_perusahaan',
        'lokasi',
        'golongan',
        'komoditas',
        'luas',
        'email',
    ];
    protected $rules = [
        // ...
        'email' => 'email',
    ];
    public function folders()
    {
        return $this->hasMany(FolderModel::class, 'perizinan_id');
    }
    public function files()
    {
        return $this->hasManyThrough(FileModel::class, FolderModel::class, 'perizinan_id', 'folder_id', 'id', 'id');
    }
    public function getTotalUkuranFile()
{
    // Mengambil total ukuran file dalam folder dan mengonversinya ke KB
    $totalUkuran = $this->files()->sum('ukuran') / 1024;

    return number_format($totalUkuran, 2) . ' KB';
}
    use HasFactory;

}
