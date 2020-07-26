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
              <li class="breadcrumb-item active">Setup</li>
              <li class="breadcrumb-item active">Township</li>
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
              
                <form method="post" action="index.php/admix/township/update">
                @csrf
                <input type="hidden"value="{{$obj->id}}" name="township_id">
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Township Name :</label>

                    <input type="text" class="form-control" id="name" value="{{$obj->name}}" name="name"  placeholder="Enter Township Name">
                  </div>
                  @error('bus_line_number')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Latitude :</label>
                    <input type="text" class="form-control" id="lat" value="{{$obj->lat}}" name="lat" placeholder="Enter Latitude">
                  </div>
                  @error('lat')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">* Longitude :</label>
                    <input type="text" class="form-control" id="lag" value="{{$obj->lag}}" name="lag" placeholder="Enter Longitude">
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