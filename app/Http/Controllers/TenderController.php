<?php

namespace App\Http\Controllers;

use App\Tender;
use Carbon\Carbon;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
        $tender = ['externalCode' => '1'
            , 'name' => 'prueba'
            ,'stateCode' => 1
            ,'closingDate' => '20160701'
            ,'registrationDate' => '20160701'];
        Tender::create($tender);
        dd("Se insertó: ".$tender);

        $obj = Tender::all();
        $tenders = json_encode($obj);
        $result = json_decode($tenders, true);

        //obtiene todas las licitaciones
        //$obj = Tender::all();
        //Se parsea a json
       //$tendersJson = json_encode($obj);
*/
        //Se crean fechas
        $today = Carbon::now();
        $initialDate = Carbon::now();
        $finalDate = Carbon::now();
        //Se establecen las fechas para el rango
        $initialDate = $initialDate->subDays(17);
        $finalDate = $finalDate->addDays(17);

        //$result = json_decode($tendersJson, true);

        //retorna las licitaciones que cierran en un rango de 35 días
        $results = DB::table('tenders')
                ->select('id'
                    ,'externalCode'
                    , 'name'
                    , 'stateCode'
                    , 'closingDate'
                    , 'registrationDate')
                //->where('closingDate', '>=', '20160809')
                ->whereBetween('closingDate', [$initialDate,$finalDate])
                ->get();
        $tendersJson = json_encode($results);
        //dd($tendersJson);
        /*
        foreach($results as $res){
            echo($res->externalCode);
        }
        */

        return view('tender.index', ['tendersJson' => $tendersJson, 'initialDate' => $initialDate, 'today' => $today]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
