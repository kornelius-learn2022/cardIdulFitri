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
        $response = ([
            "status" => 200,
            "data" => $tampil
        ]);
        return response()->json($response);
    }

    public function insert(Request $request)
    {
        $response = [];
        try {
            $content = new card_model;
            $content->x = $request->input('nama');
            $content->pesan_user = $request->input('pesan');
            $tanggal = date('Y-m-d H:i:s');
            $content->tanggal_dibuat = $request->input('tanggal', $tanggal);
            $content->save();
            $response['status'] = 200;
            $response['message'] = "Data tersimpan";
        } catch (Exception) {
            $response['status'] = 200;
            $response['message'] = "Data tidak tersimpan";
        }
        return response()->json($response);
    }

    public function tampil_byID($id)
    {
        $response = [];
        $content = card_model::where('id_user', $id)->get();
        if ($content->count() == 0) {
            $response['message'] = "Data tidak ditemukan";
        } else {
            $response["status"] = 200;
            $response["data"] = $content;
        }


        return response()->json(($response));
    }
}
