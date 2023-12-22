<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NoHandphone;
use App\Models\Provider;
use DataTables;
use Illuminate\Support\Facades\Validator;

class InputController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->flash('current_link', '/');
        return view('input.list');
    }

    public function insertManual (Request $request)
    {
        // dd($request->all());
        try {
            $nohp = strtoupper($request->no_hp);
            $provider = strtoupper($request->provider);

            $data = array(
                "no_hp" => $nohp,
                "provider_id" => $provider,
            );

            NoHandphone::insert($data);

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

    public function insertAuto (Request $request)
    {
        // dd($request->all());
        try {
            $dataInsert = [];
            for($i = 1; $i <= 25; $i++){
                $noHp = "08".$this->generateRandomNumber();
                $provider = $this->generateRandomProvider();

                $data = [
                    "no_hp" => $noHp,
                    "provider_id" => $provider,
                ];

                array_push($dataInsert, $data);
            }
            
            NoHandphone::insert($dataInsert);

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

    public function getProvider (Request $request)
    {
        try {
            $data = Provider::select("*")->get();

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

    public function generateRandomNumber()
    {
        // for ($randomNumber = mt_rand(1, 9), $i = 1; $i < 10; $i++) {
        //     $randomNumber .= mt_rand(0, 9);
        // }

        $randomNumber = rand(1111111111,9999999999);
        
        return $randomNumber;
    }

    public function generateRandomProvider()
    {
        $count = Provider::count();
        $randomNumber = rand(1,$count);
        
        return $randomNumber;
    }
}
?>