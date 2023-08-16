@extends('sidebar')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
          <h1>Fee Category List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="add-fees">
            <button type="button" class="btn btn-primary">Add New Fee Structure</button>
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
                  <th>Year</th>
                  <th>Class</th>
                  <th>Admission Fee</th>
                  <th>Lab/Library Fee</th>
                  <th>Monthly Payable</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $i)
                <tr>
                  <td>{{$i->year}}</td>
                  <td>{{$i->class}}</td>
                  <td>{{$i->admissionfee}}</td>
                  <td>{{$i->labfee}}</td>
                  <td>{{$i->monthlyfee}}</td>
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