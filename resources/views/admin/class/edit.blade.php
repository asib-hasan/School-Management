@extends('layout.sidebar')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Logout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
              <div class="card card-primary" style="width: 1000px">
                <div class="card-header">
                  <h3 class="card-title">Edit Class</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('admin/class/edit/'.$getRecord->id)}}" enctype="multipart/form-data">
                 @csrf
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{$getRecord->id}}">
                    <div class="form-group">
                        <label for="Name">Class Name</label>
                        <input type="text" class="form-control" id="name" value="{{$getRecord->name}}" name="name" placeholder="Enter class name">
                    </div>

                    <div class="form-group">
                      <label for="Name">Status</label>
                      <select class="form-control" name="status">
                        <option {{($getRecord->status==0)?'selected':''}} value="0">Active</option>
                        <option {{($getRecord->status==1)?'selected':''}} value="1">Inactive</option>
                      </select>
                    </div>                    
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="margin-left: 400px">UPDATE</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection