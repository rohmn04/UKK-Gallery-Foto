<?php

namespace App\Models;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_user',
    	'id_foto',
    ];


    protected $table = 'table_like';

    public function user(){
    	return $this->belongsTo(User::class, 'id_user','id');
    }
    public function Upload(){
    	return $this->belongsTo(Post::class, 'id_user','id');
    }
}
