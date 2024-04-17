<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Transformer\JadwalTransformer;
use Exception;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class JadwalController extends Controller
{
    public function index(Request $request){
        $perPage = $request->get('per_page', 10);
        $query = Jadwal::select('*');
        $query = $query->paginate($perPage);
        $datas = $query->getCollection();

        $fractal = new Manager();
        $resource = new Collection($datas, new JadwalTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($query));
        $res = $fractal->createData($resource)->toArray();

        return response()->json($res, 200);
    }

    public function detail(Request $request)
    {
        //find post by ID
        $id = $request->id;
        $data = Jadwal::find($id);
        if ($data) {
            $fractal = new Manager();
            $resource = new Item($data, new JadwalTransformer());
            $res = $fractal->createData($resource)->toArray();

            return response()->json($res, 200);
        } else {
            return response()->json(['message' => "Data tidak ditemukan"], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all(); // Serialize
            $model = new Jadwal;
            $model = $model->fill($data);
            $query = $model->save();
            if ($query) {
                return response()->json(["message" => "Data berhasil disimpan"], 200);
            } else {
                return response()->json(["message" => "Data gagal disimpan"], 200);
            }
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $deleted = Jadwal::find($id)->delete();
        if ($deleted) {
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } else {
            return response()->json(["message" => "Data gagal dihapus"], 200);
        }
    }
}