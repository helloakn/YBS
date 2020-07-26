@extends('Admin.Layout.Main')

@section('title')
Yangon Bus : dashboard
@endsection

@section('caption')

@endsection

@section('actionButton')
  <a href="index.php/admix/busstop/setup" class="btn btn-success">Create</a>
@endsection



@section('pagename')
Bus Stop
@endsection

@section('currentRoute')
<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Location</li>
              <li class="breadcrumb-item active">BusStop</li>
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
<div class="row overflow-auto">
          <div class="col-lg-12 col-12 mainContainer">
          <div class="row">
            <div class="col-md6">
              {{ $busStop->links() }}
            </div>
            <div class="col-md6  ml-custom-left">

            <form id="frmSearch" class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
              <input class="form-control mr-3 w-70" type="text" name="search" value="{{ ($search==null?'':$search) }}" placeholder="Search"
                aria-label="Search">
              <i class="fas fa-search text-info" aria-hidden="true"></i>
            </form>

            </div>
          </div>
</div>


<div class="container-fluid">


        <!-- Small boxes (Stat box) -->
    
          
        <div class="row ">
          <div class="col-md-12 " >
          
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name  </th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Township</th>
                  <th scope="col">
                    <div class="row">
                      <div class="  ml-custom-left">
                        Action
                      </div>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($busStop as $bstop)
                <tr>
                  <th scope="row">{{$bstop->id}}</th>
                  <td>{{$bstop->name}}</td>
                  <td>{{$bstop->lat}}</td>
                  <td>{{$bstop->lag}}</td>
                  <td>{{$bstop->TownshipName}}</td>
                  <td>
                    <div class="row">
                      <div class="  ml-custom-left">
                      <button type="button" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>

            {{ $busStop->links() }}
          </div>
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