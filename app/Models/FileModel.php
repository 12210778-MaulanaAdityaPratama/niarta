<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    use HasFactory;

    protected $table = 'file';
    protected $fillable = [
        'nama_file',
        'ukuran',
        'folder_id',
    ];

    public function folder()
    {
        return $this->belongsTo(FolderModel::class, 'folder_id');
    }
    public function getFormattedUkuranAttribute()
{
    // Mengubah ukuran file ke dalam format yang diinginkan, misalnya KB
    return number_format($this->attributes['ukuran'] / 1024, 2) . ' KB';
}
}
