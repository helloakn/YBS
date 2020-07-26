@extends('Admin.Layout.Main')

@section('title')
Yangon Bus : Township
@endsection

@section('caption')

@endsection

@section('actionButton')
  <a href="index.php/admix/township/setup" class="btn btn-success">Create</a>
@endsection



@section('pagename')
Township
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
<div class="row overflow-auto">
          <div class="col-lg-12 col-12 mainContainer">
          <div class="row">
            <div class="col-md6">
              {{ $result->links() }}
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
                  <th scope="col">Name </th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Logitude</th>
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
                @foreach ($result as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>
                  <i class="fas fa-city text-info nav-icon"></i>  {{$row->name}}
                  </td>
                  <td>
                  <i class="fas fa-map-marker-alt text-info nav-icon"></i> {{$row->lat}}
                  </td>
                  <td>
                  <i class="fas fa-map-marker-alt text-info nav-icon"></i> {{$row->lag}}
                  </td>
                  <td>
                    <div class="row">
                      <div class="  ml-custom-left">
                        <a href="index.php/admix/township/edit/{{$row->id}}" tag="{{$row->id}}" class="btnEdit btn btn-primary">Edit</a>
                        <a href="#" tag="{{$row->id}}" class="btnDelete btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>

            {{ $result->links() }}
          </div>
        </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

@endsection


@section('jslink')
<!-- ChartJS -->
<script src="resources/js/sweetalert2.9.js"></script>
@endsection

@section('jscode')

<script>
   $(document).ready(function(){
     $('.fa-search').click(function(){
        $("#frmSearch").submit();
     });

     $(".btnDelete").click(function(e){
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            window.location = "index.php/admix/township/delete/"+$(this).attr('tag');
          }
        });//end sweet alert
     });//end btndelete
   });
</script>

@endsection