<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function index(){
        // Untuk Modal
        $target_modal = 1;
        $id_modal = 1;

        // Select Album
        $data = DB::table('album')
        ->join('users', 'users.id', '=', 'album.id')
        ->get();

        // Total Data Album
        $count = $data->count();

        return view('home', ['data'=>$data, 'target_modal'=>$target_modal, 'id_modal'=>$id_modal, 'count'=>$count]);
    }


    public function upload(Request $req){
        // Validasi
        request()->validate([
            'gambar' => 'required|image|mimes: jpg,png,svg,jpeg,gif|max:2048',
        ]);
        // DateTime
        $date = date('Y/m/d H:i:s');
        // id Session User
        $id = Auth::user()->id;
        // Penamaan File Gambar dan Penempatannya
        $NamaGambar = time().'.'.$req->gambar->extension();
        $req->gambar->move(public_path('images'), $NamaGambar);
        // Insert
        DB::table('album')->insert([
            'id' => $id,
            'judul' => $req->judul,
            'deskripsi' => $req->deskripsi,
            'kategori' => $req->kategori,
            'gambar' => $NamaGambar,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        return redirect('/');
    }


    public function kategori($kategori){
        // Untuk Modal
        $target_modal = 1;
        $id_modal = 1;
        // Kategori
        $kate = $kategori;
        // Select
        $data = DB::table('album')
        ->join('users', 'users.id', '=', 'album.id')
        ->where('album.kategori', $kategori)
        ->get();
        // Total Data
        $count = $data->count();
        return view('kategori', ['data'=>$data, 'target_modal'=>$target_modal, 'id_modal'=>$id_modal, 'count'=>$count, 'kate'=>$kate]);
    }


    public function me(){
        // Untuk Modal
        $target_modal = 1;
        $id_modal = 1;
        // Session User
        $id = Auth::user()->id;
        // Select
        $data = DB::table('album')
        ->join('users', 'users.id', '=', 'album.id')
        ->where('users.id', $id)
        ->get();
        // Total Data
        $count = $data->count();
        return view('my_post', ['data'=>$data, 'target_modal'=>$target_modal, 'id_modal'=>$id_modal, 'count'=>$count]);
    }


    public function edit_page($album_id){
        // Select
        $data = DB::table('album')
        ->join('users', 'users.id', '=', 'album.id')
        ->where('album.album_id', $album_id)
        ->get();
        return view('edit', ['data'=>$data]);
    }


    public function edit(Request $req){
        // DateTime
        $date = date('Y/m/d H:i:s');

        // Penamaan File Gambar dan Penempatannya
        $NamaGambar = $req->gambar;

        // Update
        DB::table('album')->where('album_id', $req->album_id)->update([
            'id' => $req->id,
            'judul' => $req->judul,
            'deskripsi' => $req->deskripsi,
            'kategori' => $req->kategori,
            'gambar' => $NamaGambar,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        return redirect('/my_posts');
    }


    public function delete($album_id){
        DB::table('album')->where('album_id', $album_id)->delete();
        return redirect('/my_posts');
    }


    public function user($username){
        // Untuk Modal
        $target_modal = 1;
        $id_modal = 1;
        // Username
        $user = $username;
        // Select
        $data = DB::table('album')
        ->join('users', 'users.id', '=', 'album.id')
        ->where('users.username', $username)
        ->get();
        // Total Data
        $count = $data->count();
        return view('people', ['data'=>$data, 'target_modal'=>$target_modal, 'id_modal'=>$id_modal, 'count'=>$count, 'user'=>$user]);
    }
    public function like(Request $req){
        DB::table('likealbum')->insert([
            'album_id' => $req->album_id,
            'id' => $req->id,
        ]);
        return redirect('/');
    }
}
