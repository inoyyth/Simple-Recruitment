<?php

namespace App\Http\Controllers;

use App\Models\PicJadwal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformer\PicJadwalTransformer;

class PicJadwalController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $query = PicJadwal::select('*');
        $query = $query->paginate($perPage);
        $datas = $query->getCollection();

        $fractal = new Manager();
        $resource = new Collection($datas, new PicJadwalTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($query));
        $res = $fractal->createData($resource)->toArray();

        return response()->json($res, 200);
    }

    public function detail(Request $request)
    {
        //find post by ID
        $id = $request->id;
        $data = PicJadwal::find($id);

        if ($data) {
            $fractal = new Manager();
            $resource = new Item($data, new PicJadwalTransformer());
            $res = $fractal->createData($resource)->toArray();

            return response()->json($res, 200);
        } else {
            
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all(); // Serialize
            $model = new PicJadwal;
            if ($request->id) {
                $model = $model->find($request->id);
                $query = $model->update($data);
            } else {
                $model->fill($data);
                $query = $model->save();
            }
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
        $deleted = PicJadwal::find($id)->delete();
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
