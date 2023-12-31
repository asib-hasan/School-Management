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
                  <h3 class="card-title">Add New Assign Subject</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('admin/assign_subject/save')}}" enctype="multipart/form-data">
                 @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                        <div class="form-group">
                            <label for="Name">Class</label>
                            <select class="form-control" name="class_id" required >
                                <option value="">Select Class</option>
                                @foreach ($getClass as $i)
                                    <option value="{{$i->id}}">{{$i->name}}</option>
                                @endforeach
                            </select>
                          </div>     
                    </div>

                    <div class="form-group">
                        <label for="">Subject Name</label>
                        
                        @foreach ($getSubject as $i)
                            <div>
                                <label style="font-weight: normal">
                                    <input type="checkbox" value="{{$i->id}}" name="subject_id[]">  {{$i->name}}
                                </label>
                            </div>
                        @endforeach
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
                    <button type="submit" class="btn btn-primary" style="margin-left: 400px">Assign</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection