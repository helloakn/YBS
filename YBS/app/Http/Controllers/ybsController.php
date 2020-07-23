<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Township;
use App\Models\Bus_Line;
use App\Models\Bus_Line_Route;
use App\Models\Bus_Stop;

class ybsController extends Controller
{
    //
    public function busLineList(Request $request){
        $busLine = Bus_Line::select('bus_line_number','bus_line_color')->orderByRaw('LENGTH(bus_line_number) asc')->orderBy('bus_line_number')->get();
        //return count($busLine);
        $outPut = array(
            "status"=>200,
            "data" => $busLine
        );
        return  $outPut;
    }

    public function busLineRouteList(Request $request,$busline){
        
        $busLineRouteList = Bus_Line_Route::select(DB::raw('IF(Bus_Line_Route.quee_no=1,"START",IF(Bus_Line_Route.quee_no=(select MAX(quee_no) from Bus_Line_Route where bus_line_id='.$busline.' ),"STOP","MIDDLE")) as routeType'),'name','lat','lag')
        ->join('Bus_Stop', 'Bus_Line_Route.bus_stop_id', '=', 'Bus_Stop.id')
        ->where('Bus_Line_Route.bus_line_id','=',$busline)
        ->orderBy('quee_no')
        ->get();
        //return count($busLine);
        $outPut = array(
            "status"=>200,
            "count" => count($busLineRouteList),
            "data" => $busLineRouteList

        );
        return  $outPut;
    }

    public function fromToRoute(Request $request,$route){
        
        $busStop = Bus_Stop::select('id','name','lat','lag')
        ->orderBy('lat',$route=='from'?'asc':'desc')
        ->orderBy('lag',$route=='from'?'asc':'desc')
        ->get();
        //return count($busLine);
        $outPut = array(
            "status"=>200,
            "count" => count($busStop),
            "data" => $busStop

        );
        return  $outPut;
    }

    public function searchRoute(Request $request,$from,$to){
        
        $bustLineList = Bus_Line_Route::select('Bus_Line.id','Bus_Line.bus_line_number','Bus_Line.bus_line_color')
        ->join('Bus_Stop', 'Bus_Line_Route.bus_stop_id', '=', 'Bus_Stop.id')
        ->join('Bus_Line', 'Bus_Line_Route.bus_line_id', '=', 'Bus_Line.id')
        //->whereIn('Bus_Line_Route.bus_stop_id',[$from,$to])
        ->where('Bus_Line_Route.bus_stop_id',$from)
        ->whereRaw('Bus_Line_Route.bus_line_id in (SELECT Bus_Line_Route.bus_line_id FROM Bus_Line_Route WHERE Bus_Line_Route.bus_stop_id='.$to.' ) ')
        //->where('Bus_Line_Route.bus_stop_id',$to)
        //->groupByRaw('Bus_Stop.name,Bus_Stop.lat,Bus_Stop.lags')
        ->get();
        //return count($busLine);

        $fromRoute = Bus_Stop::select('id','name','lat','lag')->where('id',$from)->first();
        $toRout = Bus_Stop::select('id','name','lat','lag')->where('id',$to)->first();
        $data = [];
        foreach($bustLineList as $bl){
            $data[] = array(
                "busLine" => $bl,
                "fromRoute" => $fromRoute,
                "toRoute" => $toRout,
            );
        }
        $outPut = array(
            "status"=>200,
            "count" => count($bustLineList),
            "data" => $data

        );
        return  $outPut;
    }
}
