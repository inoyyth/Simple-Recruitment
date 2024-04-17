<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformer\PelamarTransformer;

class PelamarController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $query = Pelamar::select('*');
        $query = $query->paginate($perPage);
        $datas = $query->getCollection();

        $fractal = new Manager();
        $resource = new Collection($datas, new PelamarTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($query));
        $res = $fractal->createData($resource)->toArray();

        return response()->json($res, 200);
    }

    public function detail(Request $request)
    {
        //find post by ID
        $id = $request->id;
        $data = Pelamar::find($id);

        if ($data) {
            $fractal = new Manager();
            $resource = new Item($data, new PelamarTransformer());
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
            $data['password'] = Hash::make($data['password']);
            $model = new Pelamar;
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
        $deleted = Pelamar::find($id)->delete();
        if ($deleted) {
            return response()->json(["message" => "Data berhasil dihapus"], 200);
        } else {
            return response()->json(["message" => "Data gagal dihapus"], 200);
        }
    }
}
