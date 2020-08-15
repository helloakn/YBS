@extends('Admin.Layout.Main')

@section('title')
Yangon Bus : Bus Line
@endsection

@section('caption')

@endsection

@section('actionButton')
  <a href="index.php/admix/township" class="btn btn-primary ">Back</a>
@endsection


@section('pagename')
Township : <label class="text-success"> Edit</label>
@endsection

@section('currentRoute')
<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bus Line Route</li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection


@section('csscode')
<style>
  label {
    font-weight: normal !important;
}
  .mainContainer{
    
  }
  .fa-search:hover{
    color:green !important;
  }
</style>
@endsection

@section('body')
<div class="container-fluid">


        <!-- Small boxes (Stat box) -->
    
          
            <div class="row ">
              <div class="col-md-4 " >
              </div>
              <div class="col-md-4 " >
              
                <form method="post" action="index.php/admix/buslineroute/update">
                @csrf
                <input type="hidden"value="{{$busLineRoute->id}}" name="buslineroute_id">
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Bus Line:</label>

                    <select class="form-control" name="busLine_id" id="exampleFormControlSelect1">
                    <option value="0">Select Bus Line</option>
                      @foreach ($busLine as $row)
                        <option value="{{$row->id}}" {{ ($busLineRoute->bus_line_id==$row->id?"selected":"") }}>{{$row->bus_line_number}} ( {{$row->bus_line_color}} )</option>
                      @endforeach
                    </select>
                  </div>
                  @error('busLine_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Bus Stop :</label>
                    <select class="form-control" name="busStop_id" id="exampleFormControlSelect1">
                    <option value="0">Select Bus Stop</option>
                      @foreach ($busStop as $row)
                        <option value="{{$row->id}}" {{ ($busLineRoute->bus_stop_id==$row->id?"selected":"") }}>{{$row->name}} </option>
                      @endforeach
                    </select>
                  </div>
                  @error('lat')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">* Route Type:</label>
                    <select class="form-control" name="routeType" id="exampleFormControlSelect1">
                    <option value="0" {{ ($busLineRoute->type==0?"selected":"") }}>Start Route</option>
                    <option value="1" {{ ($busLineRoute->type==1?"selected":"") }}>Middle Route</option>
                    <option value="2" {{ ($busLineRoute->type==2?"selected":"" )}} >End Route</option>
                    </select>
                  </div>
                  @error('lat')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  
                  <button type="submit" class="btn btn-success">Update</button>
                </form>  

              </div>
              <div class="col-md-4 " >
              </div>
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

@endsection


@section('jslink')

@endsection

@section('jscode')

<script>
   $(document).ready(function(){
     
   });
</script>

@endsection