<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Album;
use App\Models\Kategori;


class Viewcontroller extends Controller
{

                //Sebelum Login//
    public function halaman_utama(Request $request)
    {
        return view('index');
    }
    public function login(Request $request)
    {
        return view('sign-in');
    }
    public function register(Request $request)
    {
        return view('sign-up');
    }

                //Masuk aplikasi//
    public function index_masuk(Request $request)
    {
        $posts = Post::where('id_user', auth()->user()->id)->get();
        $name = User::where('id', auth()->user()->id)->get();
        return view('User.index',compact('posts'));
    }
    public function create(Request $request)
    {
        $album = Album::where('id_user', auth()->user()->id)->get();
        return view('User.create', compact('album'));
    
    }
    public function foto(Request $request)
    {   
        $kategori = Kategori::all();
        $album = Album::where('id_user', auth()->id())->get();
        return view('User.foto', compact('album','kategori'));
    }
    public function album(Request $request)
    {
        return view('User.album');
    }
    public function profile(Request $request)
    {
         $name = User::where('id', auth()->user()->id)->first();
        return view('User.profile', compact('name'));
    }
    public function view(Request $request)
    {
        return view('User.view');
    }
    public function viewAlbum(Request $request)
    {
        return view('User.viewAlbum');
    }
     public function explore(Request $request)
    {

        if($request->kategori) {
            $kategori_search = Kategori::where('nama_kategori', $request->kategori)->first();
            $posts              = Post::where('id_kategori', $kategori_search->id)->get();
        }
        else{
            $posts = Post::all();
        }

        $kategori = Kategori::all();

        return view('User.explore',compact('posts','kategori'));
    }
    public function edit(Request $request)
    {
        return view('User.edit');
    }
    public function editprofile(Request $request)
    {
        return view('User.editprofile');
    }
    public function formedit(Request $request, $id){
        $foto = Post::findorfail($id);
        return view('User.edit', compact('foto'));
    }
    
}
