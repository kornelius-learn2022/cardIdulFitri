<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\card_model;
use Exception;

class card extends Controller
{

    public function tampil()
    {
        $tampil = card_model::all();
        return $tampil;
    }

    public function insert(Request $request)
    {
        try {
            $content = new card_model;
            $content->nama_user = $request->input('nama');
            $content->pesan_user = $request->input('pesan');
            $tanggal = date('Y-m-d H:i:s');
            $content->tanggal_dibuat = $request->input('tanggal', $tanggal);
            $content->save();
            $response = [
                'message' => "Data tersimpan"
            ];
            return response()->json($response);
        } catch (Exception) {
            return response()->json([
                'message' => "Data tidak tersimpan"
            ]);
        }
    }
}
