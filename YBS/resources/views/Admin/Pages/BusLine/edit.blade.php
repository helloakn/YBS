@extends('Admin.Layout.Main')

@section('title')
Yangon Bus : Bus Line
@endsection

@section('caption')

@endsection

@section('actionButton')
  <a href="index.php/admix/busline" class="btn btn-primary ">Back</a>
@endsection


@section('pagename')
Bus Line : Edit
@endsection

@section('currentRoute')
<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setup</li>
              <li class="breadcrumb-item active">Bus Line</li>
            </ol>
@endsection


@section('csscode')
<style>
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
              
                <form method="post" action="index.php/admix/busline/update">
                @csrf
                <input type="hidden"value="{{$busLine->id}}" name="bus_line_id">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bus Line Number</label>

                    <input type="text" class="form-control" id="bus_line_number" value="{{$busLine->bus_line_number}}" name="bus_line_number"  placeholder="Enter bus line number" readonly>
                  </div>
                  @error('bus_line_number')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bus Line Color</label>
                    <input type="text" class="form-control" id="bus_line_color" value="{{$busLine->bus_line_color}}" name="bus_line_color" placeholder="Enter bus line color">
                  </div>
                  @error('bus_line_color')
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