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
              <li class="breadcrumb-item active">General Form</li>
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
                  <h3 class="card-title">Add New Employee</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('save-employee')}}" enctype="multipart/form-data">
                 @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="reg">Registration No.</label>
                        <input type="text" class="form-control" name="reg" placeholder="Create Reg. No">
                    </div> 
                    <div class="form-group">
                        <label class="from-lebel">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Femaile">Female</option>
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email">
                    </div>
                   
                    <div class="form-group">
                        <label for="class">Designation</label>
                        <select class="form-control" id="class" name="designation">
                        <option value="teacher">Teacher</option>
                        <option value="labassistant">Lab Assistant</option>
                        <option value="librarian">Librarian</option>
                        <option value="doorman">Door Man</option>
                        <option value="nurse">Nurse</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label class="from-lebel">Phone</label>
                        <input type="text" class="form-control" name="phone">
                      </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Make password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection