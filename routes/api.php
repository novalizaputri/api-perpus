<?php

use App\Http\Controllers\AuthC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersC;
use Illuminate\Http\Request;
use App\Http\Controllers\PeminjamanC;
use App\Http\Controllers\BukuC;


route::get('/about', function(){
    return 'Salsabilla dan Novaliza !';
});

Route::apiResource('/peminjaman', PeminjamanC::class) -> middleware(['auth:sanctum']);
Route::apiResource('/buku', BukuC::class);

route::post('/login',[AuthC::class,'login']);

route::get('/kasir',function(){
    return Hash::make('kasir');
});

route::get('/pelanggan',function(){
    return Hash::make('pelanggan');
});

route::apiResource('/users', UsersC::class);