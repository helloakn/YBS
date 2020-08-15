<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Bus_Stop;
use App\Models\Bus_Line;
use App\Models\Bus_Line_Route;

class busLineRouteController extends Controller
{
    //
   
    public function index(Request $request){
        $search = $request->get('search');
        //dd($search);
        $objs = Bus_Line_Route::select('Bus_Line_Route.id',
            'Bus_Line.bus_line_number','Bus_Line.bus_line_color',
            'Bus_Stop.name','Bus_Stop.lat','Bus_Stop.lag')
        ->join('Bus_Line','Bus_Line_Route.bus_line_id','=','Bus_Line.id')
        ->join('Bus_Stop','Bus_Line_Route.bus_stop_id','=','Bus_Stop.id');
        if($search){
            $objs = $objs->where('Bus_Line.bus_line_number','like','%'.$search.'%');
        }
        $objs = $objs->orderBy('Bus_Line_Route.id','desc') ->paginate(20);
       // dd($busStop,$busStop->current_page);
       $data = array('result'=>$objs->appends($request->input()),
       'search'=>$search);
        return view('Admin.Pages.BusLineRoute.listing')->with($data);
    }
    public function Setup(Request $request){
        $search = $request->get('search');
        //dd($search);
        $busLine = Bus_Line::select('Bus_Line.id','Bus_Line.bus_line_number','Bus_Line.bus_line_color')
                    ->orderBy('Bus_Line.bus_line_number') ->get();
        $busStop = Bus_Stop::select('id','name')
                    ->orderBy('id','desc') ->get();           
       // dd($busStop,$busStop->current_page);
       $data = array(
           'busLine'=>$busLine,
            'busStop'=>$busStop
        );
        return view('Admin.Pages.BusLineRoute.setup')->with($data);
    }

    public function Insert(Request $request){
        

        $validator = Validator::make($request->all(), [
            'busLine_id' => 'required',
            'busStop_id' => 'required',
            'routeType' => 'required',
        ]);

        if ($validator->fails()) {
           // return "fucking failed";
            return redirect()->route('setupBusLine')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $busLineRoute = Bus_Line_Route::where('bus_line_id',$request->get('busLine_id'))
                            ->where('bus_stop_id',$request->get('busStop_id'))->first();
            if($busLineRoute)
            {
                return redirect()->route('listingBusLineRoute');
            }
            else{
                $busLineRoute = new Bus_Line_Route();
                $busLineRoute->bus_line_id = $request->get('busLine_id');
                $busLineRoute->bus_stop_id = $request->get('busStop_id');
                $busLineRoute->type = $request->get('routeType');
                $busLineRoute->quee_no = 0;
                $busLineRoute->save();
                return redirect()->route('listingBusLineRoute');
            }
            
        }
        
    }

    public function Update(Request $request){
        $id = $request->get('buslineroute_id');
        $busLineRoute = Bus_Line_Route::where('id',$id)->first();
        if($busLineRoute){
            $validator = Validator::make($request->all(), [
                'busLine_id' => 'required',
                'busStop_id' => 'required',
                'routeType' => 'required',
            ]);
            if ($validator->fails()) {
                // return "fucking failed";
                 return redirect('admix/busline/edit/'.$id)
                             ->withErrors($validator)
                             ->withInput();
             }
             else{
                $busLineRoute->bus_line_id = $request->get('busLine_id');
                $busLineRoute->bus_stop_id = $request->get('busStop_id');
                $busLineRoute->type = $request->get('routeType');
                $busLineRoute->save();
                return redirect()->route('listingBusLineRoute');
            }
        }
        else{
            return redirect()->route('listingBusLineRoute');
        }
    }
    public function Edit(Request $request,$id){
        $busLineRoute = Bus_Line_Route::where('id',$id)->first();
        if($busLineRoute){

            $busLine = Bus_Line::select('Bus_Line.id','Bus_Line.bus_line_number','Bus_Line.bus_line_color')
                    ->orderBy('Bus_Line.bus_line_number') ->get();
            $busStop = Bus_Stop::select('id','name')
                    ->orderBy('id','desc') ->get(); 

            $data = array('busLineRoute'=>$busLineRoute,
            'busLine'=>$busLine,
            'busStop'=>$busStop,
        );
             return view('Admin.Pages.BusLineRoute.edit')->with($data);
        }
        else{
            return redirect()->route('listingBusLineRoute');
        }
    }

    public function Delete(Request $request,$id){
        $busLineRoute = Bus_Line_Route::where('id',$id)->first();
        if($busLineRoute){
            $busLineRoute->delete();
            return redirect()->route('listingBusLineRoute');
        }
        else{
            return redirect()->route('listingBusLineRoute');
        }
    }
}
