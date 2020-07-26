<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Bus_Stop;
use App\Models\Bus_Line;
use App\Models\Township;

class townshipController extends Controller
{
    //
   
    public function township(Request $request){
        $search = $request->get('search');
        //dd($search);
        $objs = Township::select('Township.id','Township.name','Township.lat','Township.lag');
        if($search){
            $objs = $objs->where('Township.name','like','%'.$search.'%');
        }
        $objs = $objs->orderBy('Township.id','desc') ->paginate(20);
       // dd($busStop,$busStop->current_page);
       $data = array('result'=>$objs->appends($request->input()),
       'search'=>$search);
        return view('Admin.Pages.Township.listing')->with($data);
    }
    public function townshipSetup(Request $request){
       
        return view('Admin.Pages.Township.setup');
    }

    public function townshipInsert(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:Township|max:255',
            'lat' => 'required',
            'lag' => 'required',
        ]);

        if ($validator->fails()) {
           // return "fucking failed";
            return redirect()->route('setupTownship')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $obj = new Township();
            $obj->name = $request->get('name');
            $obj->lat = $request->get('lat');
            $obj->lag = $request->get('lag');
            $obj->save();
            return redirect()->route('listingTownship');
        }
        
    }

    public function townshipUpdate(Request $request){
        $id = $request->get('township_id');
        $obj = Township::where('id',$id)->first();
        if($obj){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lat' => 'required',
                'lag' => 'required',
            ]);
            if ($validator->fails()) {
                // return "fucking failed";
                 return redirect('admix/township/edit/'.$id)
                             ->withErrors($validator)
                             ->withInput();
             }
             else{
                $obj->name = $request->get('name');
                $obj->lat = $request->get('lat');
                $obj->lag = $request->get('lag');
                $obj->save();
                return redirect()->route('listingTownship');
            }
        }
        else{
            return redirect()->route('listingTownship');
        }
    }
    public function townshipEdit(Request $request,$id){
        $obj = Township::where('id',$id)->first();
        if($obj){
            $data = array('obj'=>$obj);
             return view('Admin.Pages.Township.edit')->with($data);
        }
        else{
            return redirect()->route('listingTownship');
        }
    }

    public function townshipDelete(Request $request,$id){
        $township = Township::where('id',$id)->first();
        if($township){
            $township->delete();  
        }
        return redirect()->route('listingTownship');
    }
}
