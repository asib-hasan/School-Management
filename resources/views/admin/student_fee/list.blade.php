@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Fee List</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-12">
                @if (Session::has('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-12" style="text-align: right">
                            <a href="{{ url('admin/student_fee/add') }}">
                                <button type="button" class="btn btn-primary">Add New</button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Fee</h3>
                        </div>
                        <form action="" method="GET">
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{Request::get('name')}}"
                                        placeholder="Enter name">
                                    </div>
                        
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                                        <a href="{{url('admin/ac_head/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Waiver</th>
                                    <th>Amount After Waiver</th>
                                    <th>Created Date</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($getRecord as $i)
                                  <tr>
                                      <td>{{$i->id}}</td>
                                      <td>{{$i->name}}</td>
                                      <td>
                                        @if ($i->status == 0)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                      </td>
                                      <td>{{$i->amount}}</td>
                                      <td>{{$i->waiver}}</td>
                                      <td>{{$u->amount_after_waiver}}</td>
                                      <td>{{$i->created_at}}</td>
                                      <td>
                                        <a href="{{url('admin/student_fee/edit/'.$i->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin/student_fee/delete/'.$i->id)}}"class="btn btn-danger">Delete</a>
                                        <a href="{{url('admin/student_fee/waiver/'.$i->id)}}" class="btn btn-primary">Appply Waiver</a>
                                      </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (empty(Request::get('name')))
                            <div style="padding: 10px;float: right">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </section>
    </div>
    <script>
        $(document).ready (function(){
            $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                 $("#success-alert").slideUp(500);
              });
        });
    </script>
@endsection
