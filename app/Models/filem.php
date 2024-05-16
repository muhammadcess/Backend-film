<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filem extends Model
{
    use HasFactory;
    protected $table = 'filems';
    protected $fillable = ['user_id','genre_id','judul','isi','gambar'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
