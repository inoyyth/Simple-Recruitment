<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Peserta;
use App\Models\User;
use App\Transformer\RoleTransformer;
use Exception;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Exports\RoleExport;
use Maatwebsite\Excel\Facades\Excel;
// use PDF;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('api', ['except' => ['export']]);
    }

    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $query = Role::select('*');
        $query = $query->paginate($perPage);
        $datas = $query->getCollection();

        $fracktal = new Manager;
        $resource = new Collection($datas, new RoleTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($query));
        $res = $fracktal->createData($resource)->toArray();

        return response()->json($res, 200);

        // $query = Role::all();
        // $query = Role::select('*')->get();
        // return json_encode($query);
    }

    public function detail(Request $request)
    {
        // $query = Role::select('*')
        //     ->where('id_role', $request->id)
        //     ->first();

        // return json_encode($query);

        $data = Role::find($request->id);
        if ($data) {
            $fracktal = new Manager;
            $resource = new Item($data, new RoleTransformer());
            $res = $fracktal->createData($resource)->toArray();

            return response()->json($res, 200);
        } else {
            return response()->json(['pesan' => 'Data Tidak Ditemukan'], 404);
        }
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

    public function export(Request $request)
    {
        $role = Role::all();
        $peserta = Peserta::all();
        $user = User::all();

        $data = [
            ['title' => 'Role', 'data' => $role], 
            ['title' => 'Peserta', 'data' => $peserta], 
            ['title' => 'User', 'data' => $user], 
        ];

        return Excel::download(new RoleExport($data), 'role.xlsx');
    }

    // public function pdf(Request $request)
    // {
    //     $data = [
    //         'name' => 'Jhon Wik Wik',
    //         'email' => 'jhon.wik@gmail.com'
    //     ];

    //     // dd(public_path() . 'images/slide2.jpg');
        
    //     $pdf = PDF::loadView('pdf.role', $data);
    //     return $pdf->download('role.pdf');

    //     // $pdf = PDF::loadView('pdf.role', $data);
	//     // return $pdf->stream('document.pdf');
    // }
}
