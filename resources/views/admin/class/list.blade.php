@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CLass List</h1>
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
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-12" style="text-align: right">
                            <a href="{{ url('admin/class/add') }}">
                                <button type="button" class="btn btn-primary">Add New Class</button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Class</h3>
                        </div>
                        <form action="" method="GET">
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{Request::get('name')}}"
                                        placeholder="Enter class name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                                        <a href="{{url('admin/class/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($getRecord as $i)
                                  <tr>
                                      <td>{{$i->id}}</td>
                                      <td>{{$i->name}}</td> {{--A confusion which name it is--}}
                                      <td>
                                        @if ($i->status == 0)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                      </td>
                                      <td>{{$i->created_by_name}}</td>
                                      <td>{{$i->created_at}}</td>
                                      <td>
                                        <a href="{{url('admin/class/edit/'.$i->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin/class/delete/'.$i->id)}}"class="btn btn-danger">Delete</a>
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
@endsection
