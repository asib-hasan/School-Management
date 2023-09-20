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
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="card card-primary" style="width: 1000px">
                            <div class="card-header">
                                <h3 class="card-title">Add New Parent</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                        <form method="post" action="{{ url('admin/parent/save') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="Name">First Name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control"
                                             name="first_name" placeholder="Enter first name">
                                    </div>
                                    <div class="form-group col-6">
                                      <label for="Name">Last Name<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" 
                                           name="last_name" placeholder="Enter last name">
                                    </div>

                                  


                                    <div class="form-group col-6">
                                      <label for="Name">Gender<span style="color: red">*</span></label>
                                      <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                      </select>
                                    </div>  
                                    <div class="form-group col-6">
                                      <label for="Name">Occupation<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" 
                                           name="occupation" placeholder="Enter occupation">
                                    </div>

                                    

                                    <div class="form-group col-6">
                                      <label for="Name">Mobile Number</label>
                                      <input type="text" class="form-control" 
                                           name="phone" placeholder="Enter mobile number">
                                    </div>
                                    

                                    <div class="form-group col-6">
                                      <label for="Name">Photo</label>
                                      <input type="file" class="form-control" 
                                           name="image">
                                    </div>
                                    <div class="form-group col-6">
                                      <label for="Name">Address</label>
                                      <input type="text" class="form-control" 
                                           name="address" placeholder="Enter address">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Status<span style="color: red">*</span></label>
                                      <select class="form-control" name="status">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                      </select>
                                    </div>  

                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Email address<span style="color: red">*</span></label>
                                        <input type="email" class="form-control"
                                            name="email" placeholder="Enter email">
                                        <div style="color: red">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Make password">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
              var today = new Date();
              var formattedDate = today.toISOString().substr(0, 10);
              document.getElementById("today").value = formattedDate;
            </script>
        </section>
    @endsection
