<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // $query = Role::all();
        $query = Role::select('*')->get();
        return json_encode($query);
    }

    public function detail(Request $request)
    {
        $query = Role::select('*')
            ->where('id_role', $request->id)
            ->first();

        return json_encode($query);
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $model = new Role;
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
        $role = Role::select('*')
            ->where('id_role', $request->id);

        $deleted = $role->delete();

        if ($deleted) {
            echo json_encode(array('status' => true, 'pesan' => 'Data Berhasil Dihapus'));
        } else {
            echo json_encode(array('status' => true, 'pesan' => 'Data Gagal Dihapus'));
        }
    }
}
