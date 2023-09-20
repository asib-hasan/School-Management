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
                  <h3 class="card-title">Add New</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('admin/student_fee/save')}}" enctype="multipart/form-data">
                 @csrf
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="Name">Select AC Head</label>
                      <select class="form-control" name="ac_head">
                        @foreach ($getHead as $i)
                         <option value="{{$i->id}}">{{$i->name}}</option>
                        @endforeach
                    
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Name">Select Class</label>
                      <select class="form-control" name="class_id">
                        @foreach ($getClass as $i)
                         <option value="{{$i->id}}">{{$i->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Name">Amount(In Tk.)</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount">
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
                    <button type="submit" class="btn btn-primary" style="margin-left: 400px">Apply</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection