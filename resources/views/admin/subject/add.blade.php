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
                  <h3 class="card-title">Add New Subject</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('admin/subject/save')}}" enctype="multipart/form-data">
                 @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                        <label for="Name">Subject Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter subject name">
                    </div>

                    <div class="form-group">
                        <label for="Name">Subject Type</label>
                        <select class="form-control" name="type">
                          <option value="theory">Theory</option>
                          <option value="practical">Practical</option>
                        </select>
                      </div>  

                    <div class="form-group">
                      <label for="Name">Status</label>
                      <select class="form-control" name="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                      </select>
                    </div>                    
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="margin-left: 400px">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection