@extends('sidebar')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            
          <h1>Employee List</h1>
          @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{url('add-employee')}}">
            <button type="button" class="btn btn-primary">Add New Employee</button>
            </a>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Teacher ID</th>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Designation</th>
                  <th>Gender</th>
                  <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="{{ asset('uploads/employees/'. $item->image)}}" alt="" height="50px" width="50px"></td>
                    <td>{{$item->designation}}</td>
                    <td>{{$item->gender}}</td>
                    <td>{{$item->email}}</td>
                  </tr>
                @endforeach
             </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
                
@endsection