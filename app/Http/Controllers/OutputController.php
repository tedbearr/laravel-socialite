<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NoHandphone;
use App\Models\Provider;
use DataTables;
use Illuminate\Support\Facades\Validator;

class OutputController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->flash('current_link', '/');
        return view('output.list');
    }

    public function table (Request $request)
    {
        $model = NoHandphone::select("*");

        return DataTables::eloquent($model)
        ->addColumn("ganjil", function($model){
            if($model->no_hp % 2 != 0){
                return $model->no_hp;
            } else {
                return "";
            }
        })
        ->addColumn("genap", function($model){
            if($model->no_hp % 2 == 0){
                return $model->no_hp;
            } else {
                return "";
            }
        })
        ->addColumn("action", function($model){
            return '
                <button type="button" onclick="updateModal(' . $model->id . ')" data-toggle="tooltip" data-placement="left" title="Edit" class="btn btn-sm btn-icon btn-round btn-info btn-edit"><i class="fa fa-edit"></i></button>
                <button type="button" onclick="deleteData(' . $model->id . ')" data-toggle="tooltip" data-placement="left" title="Delete" class="btn btn-sm btn-icon btn-round btn-danger btn-delete"><i class="fa fa-trash"></i></button>
            ';
        })
        ->rawColumns(['action'])
        ->make();
    }

    public function find (Request $request)
    {
        try {
            $id = $request->id;

            $data = NoHandphone::where("id", $id)->first();

            $response = array(
                "code" => "00",
                "message" => "success",
                "data" => $data,
            );

            return response()->json($response);
        } catch (\Throwable $th) {
            $response = array(
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => [],
            );

            return response()->json($response);
        }
    }

    public function update (Request $request)
    {
        try {
            $id = $request->id;
            $noHp = $request->noHp;

            $data = array(
                "no_hp" => $noHp,
                "updated_at" => date("Y-m-d H:i:s")
            );

            NoHandphone::where("id", $id)->update($data);

            $response = array(
                "code" => "00",
                "message" => "success",
                "data" => [],
            );

            return response()->json($response);
        } catch (\Throwable $th) {
            $response = array(
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => [],
            );

            return response()->json($response);
        }
    }

    public function deleteData (Request $request)
    {
        try {
            $id = $request->id;

            NoHandphone::where("id", $id)->delete();

            $response = array(
                "code" => "00",
                "message" => "success",
                "data" => [],
            );

            return response()->json($response);
        } catch (\Throwable $th) {
            $response = array(
                "code" => "500",
                "message" => $th->getMessage(),
                "data" => [],
            );

            return response()->json($response);
        }
    }
}
?>