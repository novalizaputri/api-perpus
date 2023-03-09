<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanM;
use Illuminate\Http\Request;
use App\Http\Resources\PeminjamanR;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PeminjamanC extends Controller
{
    public function index()
    {
        $peminjaman = PeminjamanM::all();
        return new PeminjamanR(true, 'List data peminjaman', $peminjaman);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_buku' => 'required',
            'id_user' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'denda' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $peminjaman = PeminjamanM::create([
            'id_buku' => $request->id_buku,
            'id_user' => $request->id_user,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'denda' => $request->denda,
        ]);

        return new PeminjamanR(true,'Data peminjaman Berhasil Di Tambahkan!', $peminjaman);
    }

    public function show(PeminjamanM $peminjaman){
        return new PeminjamanR(true, 'Data peminjaman Di Temukan!', $peminjaman);
    }
    public function update(Request $request, PeminjamanM $peminjaman){
        $validator = Validator::make($request->all(), [
            'id_buku' => 'required',
            'id_user' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'denda' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
            $peminjaman->update([
                'id_buku' => $request->id_buku,
                'id_user' => $request->id_user,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'denda' => $request->denda,
            ]);
        return new PeminjamanR(true, 'Data peminjaman Berhasil Diubah!', $peminjaman);
    }

    public function destroy(PeminjamanM $peminjaman){
        $peminjaman->delete();

        return new PeminjamanR(true, 'Data peminjaman Berhasil Dihapus!', null);
    }
}