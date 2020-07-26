<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Bus_Stop;
use App\Models\Bus_Line;

class busController extends Controller
{
    //
    public function busStop(Request $request){
        $search = $request->get('search');
        //dd($search);
        $busStop = Bus_Stop::select('Bus_Stop.id','Bus_Stop.name','Bus_Stop.lat','Bus_Stop.lag','Township.name as TownshipName')
            ->leftJoin('Township','Bus_Stop.township_id','=','Township.id');
        if($search){
            $busStop = $busStop->where('Bus_Stop.name','like','%'.$search.'%');
        }
        $busStop =  $busStop->orderBy('Bus_Stop.id','desc') ->paginate(20);
       // dd($busStop,$busStop->current_page);
       $data = array('busStop'=>$busStop->appends($request->input()),
       'search'=>$search);
        return view('Admin.Pages.BusStop.listing')->with($data);
    }

    public function busLine(Request $request){
        $search = $request->get('search');
        //dd($search);
        $busLine = Bus_Line::select('Bus_Line.id','Bus_Line.bus_line_number','Bus_Line.bus_line_color');
        if($search){
            $busLine = $busLine->where('Bus_Line.bus_line_number','like','%'.$search.'%');
        }
        $busLine = $busLine->orderBy('Bus_Line.id','desc') ->paginate(20);
       // dd($busStop,$busStop->current_page);
       $data = array('busLine'=>$busLine->appends($request->input()),
       'search'=>$search);
        return view('Admin.Pages.busLine.listing')->with($data);
    }
    public function buslineSetup(Request $request){
        $search = $request->get('search');
        //dd($search);
        $busLine = Bus_Line::select('Bus_Line.id','Bus_Line.bus_line_number','Bus_Line.bus_line_color');
        if($search){
            $busLine = $busLine->where('Bus_Line.bus_line_number','like','%'.$search.'%');
        }
        $busLine = $busLine->orderBy('Bus_Line.id','desc') ->paginate(20);
       // dd($busStop,$busStop->current_page);
       $data = array('busLine'=>$busLine->appends($request->input()),
       'search'=>$search);
        return view('Admin.Pages.busLine.setup')->with($data);
    }

    public function buslineSetupPost(Request $request){
        

        $validator = Validator::make($request->all(), [
            'bus_line_number' => 'required|unique:Bus_Line|max:255',
            'bus_line_color' => 'required',
        ]);

        if ($validator->fails()) {
           // return "fucking failed";
            return redirect()->route('setupBusLine')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $busLine = new Bus_Line();
            $busLine->bus_line_number = $request->get('bus_line_number');
            $busLine->bus_line_color = $request->get('bus_line_color');
            $busLine->save();
            return redirect()->route('listingBusLine');
        }
        
    }

    public function buslineUpdate(Request $request){
        $search = $request->get('search');
        //dd($search);
        $busLine = Bus_Line::select('Bus_Line.id','Bus_Line.bus_line_number','Bus_Line.bus_line_color');
        if($search){
            $busLine = $busLine->where('Bus_Line.bus_line_number','like','%'.$search.'%');
        }
        $busLine = $busLine->orderBy('Bus_Line.id','desc') ->paginate(20);
       // dd($busStop,$busStop->current_page);
       $data = array('busLine'=>$busLine->appends($request->input()),
       'search'=>$search);
        return view('Admin.Pages.busLine.setup')->with($data);
    }
}
