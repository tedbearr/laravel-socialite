<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Books;
use DataTables;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->flash('current_link', '/');
        return view('home.list');
    }

    public function table (Request $equest)
    {
        $model = Books::select("*");

        return DataTables::eloquent($model)
        ->addColumn("action", function($model){
            return '
                <button type="button" onclick="viewModal(' . $model->id . ')" data-toggle="tooltip" data-placement="left" title="View" class="btn btn-sm btn-icon btn-round btn-warning btn-view"><i class="fa fa-eye"></i></button>
                <button type="button" onclick="updateModal(' . $model->id . ')" data-toggle="tooltip" data-placement="left" title="Edit" class="btn btn-sm btn-icon btn-round btn-info btn-edit"><i class="fa fa-edit"></i></button>
                <button type="button" onclick="deleteData(' . $model->id . ')" data-toggle="tooltip" data-placement="left" title="Delete" class="btn btn-sm btn-icon btn-round btn-danger btn-delete"><i class="fa fa-trash"></i></button>
            ';
        })
        ->rawColumns(['action'])
        ->make();
    }

    public function insert (Request $request)
    {
        // dd($request->all());
        try {
            $validated = Validator::make(
                array(
                    'Title' => $request->title,
                    'Description' => $request->description,
                ),
                // Rules
                array(
                    'Title' => 'required',
                    'Description' => 'required',
                ),
                // Message
                array(
                    'required' => ':attribute is required',
                    'alpha_dash' => ':attribute can only contain an alphabets, numbers, (-) or (_)',
                    'alpha' => ':attribute can only contain an alphabets',
                    'unique' => ':attribute already used, use another one',
                    'email' => 'Incorrect :attribute format',
                    'date' => 'Incorrect :attribute format',
                    'min' => ':attribute must be 2 characters',
                    'max' => ':attribute must be 2 characters'
                )
            );
            if ($validated->fails()) {
                $messages = $validated->messages();
                $strMsg = '';
                foreach ($messages->all() as $message) {
                    $strMsg = $strMsg . ' ' . $message . ",";
                }
                
                return response()->json([
                    "code" => "400",
                    "message" => $strMsg,
                    "data" => []
                ]);
            }

            $title = strtoupper($request->title);
            $description = strtoupper($request->description);

            $count = Books::count();
            $code = "BOOK" . str_pad($count + 1, 3, "0", STR_PAD_LEFT);

            $data = array(
                "code" => $code,
                "title" => $title,
                "description" => $description,
            );

            Books::insert($data);

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

    public function update (Request $request)
    {
        try {
            $validated = Validator::make(
                array(
                    'Title' => $request->title,
                    'Description' => $request->description,
                ),
                // Rules
                array(
                    'Title' => 'required',
                    'Description' => 'required',
                ),
                // Message
                array(
                    'required' => ':attribute is required',
                    'alpha_dash' => ':attribute can only contain an alphabets, numbers, (-) or (_)',
                    'alpha' => ':attribute can only contain an alphabets',
                    'unique' => ':attribute already used, use another one',
                    'email' => 'Incorrect :attribute format',
                    'date' => 'Incorrect :attribute format',
                    'min' => ':attribute must be 2 characters',
                    'max' => ':attribute must be 2 characters'
                )
            );
            if ($validated->fails()) {
                $messages = $validated->messages();
                $strMsg = '';
                foreach ($messages->all() as $message) {
                    $strMsg = $strMsg . ' ' . $message . ",";
                }
                $msg->code = 0;
                $msg->msg = $strMsg;
                return response()->json($msg);
            }

            $title = strtoupper($request->title);
            $description = strtoupper($request->description);
            $id = $request->id;

            $data = array(
                "title" => $title,
                "description" => $description,
                "updated_at" => date("Y-m-d H:i:s"),
            );

            Books::where("id", $id)->update($data);

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

    public function find (Request $request)
    {
        try {
            $id = $request->id;

            $data = Books::where("id", $id)->first();

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

    public function delete (Request $request)
    {
        try {
            $id = $request->id;

            Books::where("id", $id)->delete();

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