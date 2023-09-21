<?php

namespace App\Models;

use App\Models\BeritaKategori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function beritaKategori(){
        return $this->belongsTo(BeritaKategori::class, 'BeritaKategori', 'id');
    }
}
