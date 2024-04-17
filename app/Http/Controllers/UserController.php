<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformer\UserTransformer;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $query = User::select('*');
        $query = $query->paginate($perPage);
        $datas = $query->getCollection();

        $fractal = new Manager;
        $resource = new Collection($datas, new UserTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($query));
        $res = $fractal->createData($resource)->toArray();

        return response()->json($res, 200);
    }

    public function getDetail(Request $request)
    {
        $data = User::find($request->id);

        if ($data) {
            $fractal = new Manager;
            $resource = new Item($data, new UserTransformer());
            $res = $fractal->createData($resource)->toArray();

            return response()->json($res, 200);
        } else {
            return response()->json(['pesan' => 'Data Tidak Ditemukan'], 404);
        }
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
