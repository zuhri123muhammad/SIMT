<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrestasiMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'name',
        'desc',
        'date',
        'level',
        'type',
        'image',
    ];
    /**
     * Get the user that owns the PrestasiMahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
}
