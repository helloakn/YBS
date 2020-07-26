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
              <li class="breadcrumb-item active">Location</li>
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
              
                <form method="post">
                @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Township Name : </label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Township Name">
                  </div>
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">* Latitude :</label>
                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Enter Latitude">
                  </div>
                  @error('lat')
                      <div class="alert alert-danger">The Latitude is required</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">* Longitude :</label>
                    <input type="text" class="form-control" id="lag" name="lag" placeholder="Enter Longitude">
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