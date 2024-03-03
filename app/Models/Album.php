<?php

namespace App\Models;


use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_user',
    	'judul_album',
    	'deskripsi_album',
    ];


    protected $table = 'table_album';

    public function user(){
    	return $this->belongsTo(User::class, 'id_user','id');
    }
    public function Upload() {
        return $this->hasMany(Upload::class,'id_user','id');
	}
}
