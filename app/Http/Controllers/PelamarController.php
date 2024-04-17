<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelamarController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelamar::all();
        return json_encode($query);
    }

    public function detail(Request $request)
    {
        //find post by ID
        $id = $request->id;
        $query = Pelamar::find($id)->first();
        return json_encode($query);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all(); // Serialize
            $data['password'] = Hash::make($data['password']);
            $model = new Pelamar;
            $model = $model->fill($data);
            $query = $model->save();
            if ($query) {
                echo json_encode(array('status' => true, 'pesan' => 'Data Berhasil Disimpan'));
            } else {
                echo json_encode(array('status' => false, 'pesan' => 'Gagal Simpan Data'));
            }
        } catch (Exception $e) {
            echo json_encode(array('status' => false, 'pesan' => $e->getMessage()));
        }
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $deleted = Pelamar::find($id)->delete();
        if($deleted)
        {
            return json_encode("Data Berhasil Di Hapus.!");
        }
        else
        {
            return json_encode("Data Gagal Di Hapus.!");
        }
    }
}
