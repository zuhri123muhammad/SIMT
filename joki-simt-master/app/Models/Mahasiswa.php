<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'avatar',
        'fullName',
        'gender',
        'address',
        'fakultas',
        'jurusan',
        'angkatan',
        'phone',
    ];

    /**
     * Get the user that owns the Mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the prestasi for the Mahasiswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestasies(): HasMany
    {
        return $this->hasMany(PrestasiMahasiswa::class, 'mahasiswa_id', 'id');
    }
}
