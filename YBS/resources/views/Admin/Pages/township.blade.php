@extends('Admin.Layout.Main')

@section('title')
Yangon Bus : dashboard
@endsection

@section('caption')
Welcome to Yangon Bus Applications
@endsection

@section('pagename')
Township
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
  .mainContainer{
    
  }
</style>
@endsection

@section('body')

<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12 mainContainer">
            
this is township



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
   

</script>

@endsection