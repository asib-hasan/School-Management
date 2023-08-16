@extends('sidebar')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            
          <h1>Employee Monthly Fee</h1>
          @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
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
                  <th>Designation</th>
                  <th>Salary</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td>Teacher</td>
                    <td>20000</td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                  </tr>
                  <tr>
                    <td>Librarian</td>
                    <td>12000</td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                  </tr>
                  <tr>
                    <td>Lab Assistant</td>
                    <td>15000</td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                  </tr>
                  <tr>
                    <td>Door Man</td>
                    <td>9000</td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                  </tr>
                  <tr>
                    <td>Nurse</td>
                    <td>6000</td>
                    <td><a href="#" class="btn btn-success">Update</a></td>
                  </tr>
             </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
                
@endsection