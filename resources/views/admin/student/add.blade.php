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
                                <h3 class="card-title">Add New Student</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                        <form method="post" action="{{ url('admin/student/save') }}" enctype="multipart/form-data">
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
                                      <label for="Name">Admission Number<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" 
                                           name="admission_number" placeholder="Enter admission number">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Roll Number<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" 
                                           name="roll_number" placeholder="Enter roll number">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Father name<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" 
                                           name="father" placeholder="Enter father name">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Mother name<span style="color: red">*</span></label>
                                      <input type="text" class="form-control" 
                                           name="mother" placeholder="Enter mother name">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Class<span style="color: red">*</span></label>
                                      <select class="form-control" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach ($getRecord as $i)
                                            <option value="{{$i->id}}">{{$i->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>  

                                    <div class="form-group col-6">
                                      <label for="Name">Admission Date</label>
                                      <input type="date" id="today" class="form-control" 
                                           name="admission_date">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Gender<span style="color: red">*</span></label>
                                      <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                      </select>
                                    </div>  

                                    <div class="form-group col-6">
                                      <label for="Name">Date of Birth</label>
                                      <input type="date" class="form-control" 
                                           name="dob" placeholder="Enter last name">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Religion</label>
                                      <input type="text" class="form-control" 
                                           name="religion" placeholder="Enter religion">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Mobile Number</label>
                                      <input type="text" class="form-control" 
                                           name="mobile" placeholder="Enter mobile number">
                                    </div>
                                    <div class="form-group col-6">
                                      <label for="Name">Blood Group</label>
                                      <input type="text" class="form-control" 
                                           name="blood_group" placeholder="Enter blood group">
                                    </div>

                                    <div class="form-group col-6">
                                      <label for="Name">Photo</label>
                                      <input type="file" class="form-control" 
                                           name="photo">
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
