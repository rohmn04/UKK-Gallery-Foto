<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nama_kategori',
    ];

    protected $table = 'table_kategori';
    public function Upload() {
        return $this->belongsTo(Post::class,'id_user','id');
    }
}
