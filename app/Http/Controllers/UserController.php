<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $query = User::all();
        $query = User::select('*')->get();
        return json_encode($query);
    }

    public function getDetail(Request $request)
    {
        $query = User::select('*')
            ->where('id_user', $request->id)
            ->first();

        return json_encode($query);
    }

    public function create(Request $request)
    {

        try {
            $data = $request->all(); // Serialize
            $data['password'] = bcrypt($request->password);
            $model = new User;
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

    public function update(Request $request)
    {

        $id = $request->id;
        $data = $request->all();
        $query = DB::table('user')->where('id_user', $id)->update($data);
        if ($query) {
            echo json_encode(array('status' => true, 'pesan' => 'Data Berhasil Dirubah'));
        } else {
            echo json_encode(array('status' => false, 'pesan' => 'Data Gagal Dirubah'));
        }
    }

    public function destroy(Request $request)
    {
        $user = User::select('*')
            ->where('id_user', $request->id);

        $deleted = $user->delete();

        if ($deleted) {
            return json_encode(array('status' => true, 'pesan' => 'Data Berhasil Dihapus'));
        } else {
            return json_encode(array('status' => false, 'pesan' => 'Data Gagal Dihapus'));
        }
    }
}
