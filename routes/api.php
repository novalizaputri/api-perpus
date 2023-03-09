<?php

use App\Http\Controllers\AuthC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PeminjamanC;
use App\Http\Controllers\BukuC;
use App\Http\Controllers\UsersC;

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