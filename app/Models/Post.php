<?php

namespace App\Models;

use App\Models\User;
use App\Models\Komen;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_user',
        'id_album',
        'id_kategori',
    	'foto',
    	'judul',
    	'deskripsi',
    ];

    protected $table = 'table_fotos';

    public function user(){
    	return $this->belongsTo(User::class, 'id_user','id');
    }
    public function album(){
        return $this->belongsTo(User::class, 'id_user','id');
    }
     public function komen() {
        return $this->hasMany(Komen::class,'id_user','id');
    }
    public function Kategori() {
        return $this->hasMany(Kategori::class,'id');
    }
}
