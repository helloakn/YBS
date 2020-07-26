<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Bus_Stop;
use App\Models\Bus_Line;
use App\Models\Township;

class busStopController extends Controller
{
    //
    public function index(Request $request){
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

    public function busstopSetup(Request $request){
        $township = Township::get();
        $data = array('township'=>$township);
        return view('Admin.Pages.BusStop.setup')->with($data);
    }

    public function busstopInsert(Request $request){
        

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lat' => 'required',
            'lag' => 'required',
        ]);

        if ($validator->fails()) {
           // return "fucking failed";
            return redirect()->route('setupBusLine')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $busstop = new Bus_Stop();
            $busstop->name = $request->get('name');
            $busstop->lat = $request->get('lat');
            $busstop->lag = $request->get('lag');
            if($request->get('township_id') != "0"){
                $busstop->township_id = $request->get('township_id');
            }
            

            $busstop->save();
            return redirect()->route('listingBusstop');
        }
        
    }

    public function busStopEdit(Request $request,$id){
        $township = Township::get();
        $obj = Bus_Stop::where('id',$id)->first();
        if($obj){
            $data = array('obj'=>$obj,'township'=>$township);
             return view('Admin.Pages.BusStop.edit')->with($data);
        }
        else{
            return redirect()->route('listingBusstop');
        }
    }
    public function busStopUpdate(Request $request){
        $id = $request->get('busstop_id');
        $obj = Bus_Stop::where('id',$id)->first();
        if($obj){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lat' => 'required',
                'lag' => 'required',
            ]);
            if ($validator->fails()) {
                // return "fucking failed";
                 return redirect('admix/busstop/edit/'.$id)
                             ->withErrors($validator)
                             ->withInput();
             }
             else{
                $obj->name = $request->get('name');
                $obj->lat = $request->get('lat');
                $obj->lag = $request->get('lag');
                if($request->get('township_id') != "0"){
                    $obj->township_id = $request->get('township_id');
                }
                $obj->save();
                return redirect()->route('listingBusstop');
            }
        }
        else{
            return redirect()->route('listingBusstop');
        }
    }

    public function busStopDelete(Request $request,$id){
        $obj = Bus_Stop::where('id',$id)->first();
        if($obj){
            $obj->delete();  
        }
        return redirect()->route('listingBusstop');
    }

}
