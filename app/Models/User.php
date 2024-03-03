<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Komen;
use App\Models\Kategori;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'nama_lengkap',
        'alamat',
        'tgl_lahir',
        'foto_profile',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

   
    
    public function Upload() {
   
        return $this->hasMany(Upload::class,'id_user','id');
    }
    public function album() {
   
        return $this->hasMany(Upload::class,'id_user','id');
    }
     public function komen() {
   
        return $this->hasMany(Komen::class,'id_kategori','id');
    }
    public function like() {
   
        return $this->hasMany(Like::class,'id_user','id');
    }

}
