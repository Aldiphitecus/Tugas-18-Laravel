<?php

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\CRUDPhoto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\pengajarController;
use App\Http\Controllers\WelcomeController;

//Percobaan 1 : Basic routing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return 'hello VSGA';
});

Route::get('/word', function(){
    return 'hello dunia';
});

Route::get('/about', function(){
    return 'NIM : 2231740002';
});

//Percobaan 2 : Basic parameter
Route::get('user/{name}', function($name){
    return 'Nama saya: ' . $name;
});

Route::get('/posts/{post}/{comment}', function($post, $comment){
    return 'Post ke-' . $post . ' Komentar ke-' . $comment;
});


//Percobaan 3 : Optional parameter
Route::get('useroptional/{name?}', function($name = null){
    return 'Nama saya: ' . $name;
});

Route::get('kodebarang/{jenis?}/{merk?}', function($jk = 'k01', $mrk = 'nokia'){
    return 'kode barang : ' . $jk . 'dengan merk ' . $mrk;
});

//Percobaan 4 : Route name
Route::get('about2', function(){
    return view('about');
})->name('about');

Route::get('tampil', function(){
    return view('tampil');
})->name('tampil');

//Percobaan 5 : 
//1. Route Redirect
Route::get('pesandisini', function(){
    return '<h1>Pesan disini</h1>';
});
Route::redirect('/contact-us', '/pesandisini');

//2. Route Group
Route::prefix('/polinema')->group (function(){
    Route::get('/dosen', function(){
        return '<h1>Daftar dosen</h1>';
    });
    Route::get('/tendik', function(){
        return '<h1>Daftar tendik</h1>';
    });
    Route::get('/dosen', function(){
        return '<h1>Daftar dosen</h1>';
    });
});

//Percobaan 6 : Route fallback
Route::fallback(function(){
    abort(403, 'Halaman ini tidak ditemukan :(');
});

//Percobaan 7: Penggunaan Route untuk Controller
Route::get('/daftar-dosen', [pengajarController::class, 'daftarPengajar']);
Route::get('/tabel-pengajar', [pengajarController::class, 'tabelPengajar']);
Route::get('/blog-pengajar', [pengajarController::class, 'blogPengajar']);

//Percobaan 8: Mengakses View dari Controller
Route::get('/pasar-buah', [PageController::class, 'satu']);

//Percobaan 9: Resource Controller 
Route::resource('crud', CRUDController::class);
Route::resource('photos', CRUDPhoto::class)->only([
    'index',
    'show'
]);
Route::resource('crud', CRUDPhoto::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

Route::get('/hello', function(){
    return view('hello', ['name' => 'Aldi Nur Fahmi']);
});

//Percobaan 11: Membuat View dari controller
Route::get('greeting', [WelcomeController::class, 'greeting']);