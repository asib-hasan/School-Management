@extends('sidebar')
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
                  <h3 class="card-title">Marks Entry</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url('save-result')}}" enctype="multipart/form-data">
                 @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label class="from-lebel">Student Registration No.</label>
                        <input type="number" class="form-control" name="reg">
                    </div>
                    <div class="form-group">
                        <label for="class">Select Class:</label>
                        <select class="form-control" id="class" name="class">
                        <option value="1">Class 1</option>
                        <option value="2">Class 2</option>
                        <option value="3">Class 3</option>
                        <option value="4">Class 4</option>
                        <option value="5">Class 5</option>
                        <option value="6">Class 6</option>
                        <option value="7">Class 7</option>
                        <option value="8">Class 8</option>
                        <option value="9">Class 9</option>
                        <option value="10">Class 10</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="bangla">Bangla</label>
                        <input type="number" class="form-control" name="bangla" >
                    </div>
                    <div class="form-group">
                        <label for="bangla">English</label>
                        <input type="number" class="form-control" name="bangla" >
                    </div>
                    <div class="form-group">
                        <label for="bangla">Math</label>
                        <input type="number" class="form-control" name="math" >
                    </div>
                    <div class="form-group">
                        <label for="bangla">Religion</label>
                        <input type="number" class="form-control" name="religion" >
                    </div>
                    <div class="form-group">
                        <label for="bangla">Science</label>
                        <input type="number" class="form-control" name="sciene" >
                    </div>
                    <div class="form-group">
                        <label for="bangla">General Knowledge</label>
                        <input type="number" class="form-control" name="gk" >
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