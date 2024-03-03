<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_user',
    	'id_foto',
    	'isi_komentar',
    ];


    protected $table = 'table_comments';

    public function user(){
    	return $this->belongsTo(User::class, 'id_user','id');
    }
    public function Upload() {
        return $this->belongsTo(Upload::class,'id_user','id');
	}
}
