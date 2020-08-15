@extends('Admin.Layout.Main')

@section('title')
Yangon Bus : Township
@endsection

@section('caption')

@endsection

@section('actionButton')
  <a href="index.php/admix/township" class="btn btn-primary ">Back</a>
@endsection



@section('pagename')
Township : <label class="text-success"> Setup</label>
@endsection

@section('currentRoute')
<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bus Line Route</li>
              <li class="breadcrumb-item active">Setup</li>
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
              
                <form method="post">
                @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Bus Line : </label>
                    <select class="form-control" name="busLine_id" id="exampleFormControlSelect1">
                    <option value="0">Select Bus Line</option>
                      @foreach ($busLine as $row)
                        <option value="{{$row->id}}">{{$row->bus_line_number}} ( {{$row->bus_line_color}} )</option>
                      @endforeach
                    </select>
                  </div>
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">* Bus Stop: </label>
                    <select class="form-control" name="busStop_id" id="exampleFormControlSelect1">
                    <option value="0">Select BusStop</option>
                      @foreach ($busStop as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('lag')
                      <div class="alert alert-danger">The Longitude is required</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">* Route Type: </label>
                    <select class="form-control" name="routeType" id="exampleFormControlSelect1">
                    <option value="0">Start Route</option>
                    <option value="1">Middle Route</option>
                    <option value="2">End Route</option>
                    </select>
                  </div>
                  @error('lag')
                      <div class="alert alert-danger">The Longitude is required</div>
                  @enderror
                  
                  <button type="submit" class="btn btn-success">Save</button>
                </form>  

              </div>
              <div class="col-md-4 " >
              </div>
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

@endsection


@section('jslink')
<!-- ChartJS -->
<script src="resources/js/Chart.min.js"></script>
@endsection

@section('jscode')

<script>
   $(document).ready(function(){
     $('.fa-search').click(function(){
        $("#frmSearch").submit();
     });
   });
</script>

@endsection