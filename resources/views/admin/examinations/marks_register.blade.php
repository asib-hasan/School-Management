@extends('layout.sidebar')
@section('content')
@php
    use App\Models\MarksModel;
@endphp
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Register</h1>
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

                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search marks register</h3>
                            </div>
                            <form action="{{route('mark_entry')}}" method="GET">
                                @csrf
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="Name">Exam</label>
                                            <select class="form-control" name="exam">
                                                @foreach ($getExam as $i)
                                                    <option 
                                                    value="{{ $i->name }}"  @if (Request::get('year'))
                                                    
                                                    {{($i->name==$exam)?'selected':''}}@endif>{{ $i->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label for="Name">Class</label>
                                            <select class="form-control" name="class_id">
                                                @foreach ($getClass as $i)
                                                    <option  @if (Request::get('year'))
                                                    
                                                    {{($i->id==$class)?'selected':''}}@endif value="{{ $i->id }}">{{ $i->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Year">Year</label>
                                            <input type="text" class="form-control" name="year" value="{{Request::get('year')}}" required placeholder="Enter year">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top:30px;">Apply</button>
                                            <a href="{{ url('admin/class/list') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        @if (Request::get('year'))    
                            
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">

                                <thead>
                                    <div class="card-header">
                                        <h3 class="card-title">Enter Marks</h3>
                                    </div>
                                    <tr>
                                        <th>Student Name</th>
                                        @foreach ($getSubject as $i)
                                            <th>{{ $i->name }}<br>
                                                <span style="color: red; font-size:12px;">Total Marks: 100</span>
                                            </th>
                                        @endforeach
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($getStudent as $student)
                                        <tr>

                                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>

                                            @foreach ($getSubject as $subject)
                                            @php
                                                $mark = MarksModel::where('student_id',$student->id)
                                                                    ->where('subject_id',$subject->id)
                                                                    ->where('exam',$exam)
                                                                    ->first();
                                            @endphp
                                                <td id="button{{ $student->id }}">
                                                    <div style="width: 150px">
                                                        Mark: <span style="font-weight: bold">(Out of 100)</span>
                                                        <input type="text" name="result"
                                                            id="result_{{ $student->id }}{{ $subject->id }}"
                                                            class="form-control" value="{{($mark? $mark->result:'')}}">
                                                        <input type="hidden" id="student_id" name="student_id"
                                                            value="{{ $student->student_id }}">
                                                        <input type="hidden" class="year" name="year" value="{{$yeared}}">   
                                                        <input type="hidden" class="exam" name="exam" value="{{$exam}}">
                                                        <input type="hidden" name="class_id" class="class_id"
                                                            value="{{ $student->class_id }}">
                                                        <button class="buttonclick btn btn-primary"
                                                            id="{{ $student->id }}" data-val="{{ $subject->id }}"
                                                            style="margin-top:10px">SAVE</button> <br>
                                                        <span class="one_{{ $student->id }}{{ $subject->id }}" style="display:none">Result:</span> <div id="res_{{ $student->id }}{{ $subject->id }}"></div><br>
                                                        <span class="two_{{ $student->id }}{{ $subject->id }}"
                                                            style="display:none">GPA:</span>
                                                        <div id="gpa_{{ $student->id }}{{ $subject->id }}"></div><br>
                                                        <span class="three_{{ $student->id }}{{ $subject->id }}"
                                                            style="display:none">Grade:</span>
                                                        <div id="grade_{{ $student->id }}{{ $subject->id }}"></div>
                                                    </div>

                                                </td>
                                            @endforeach
                                            <td>
                                                <button class="finalSubmit btn btn-success" id="{{ $student->id }}" style="margin-top:20px;" class="btn btn-success">SAVE</button><br>
                                                <span class="one_{{ $student->id }}" style="display:none">Result:</span> <div id="res_{{ $student->id }}"></div><br>
                                                        <span class="two_{{ $student->id }}"
                                                            style="display:none">Final GPA:</span>
                                                        <div id="gpa_{{ $student->id }}"></div><br>
                                                        <span class="three_{{ $student->id }}"
                                                            style="display:none">Final Grade:</span>
                                                        <div id="grade_{{ $student->id }}"></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div style>
                    <!-- /.card -->
                </div>
            </div>
    </div>
    </section>
    </div>
    <script>
        $(document).ready(function() {
            $('.finalSubmit').click(function(){
                alert('Marks Successfully Registered');
                var student_id = $(this).attr('id');
                var subject_id = $(this).attr('data-val');
                var exam = $('.exam').val();
                var year = $('.year').val();
                var class_id = $('.class_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ route('mark_insert') }}",
                    data: {
                        student_id: student_id,    
                        year: year,
                        exam : exam,
                        class_id : class_id,
                    },
                    success: function(response) {
                        
                        $('.one_' + student_id).css({
                            'display': 'inline',
                        });
                        $('.two_' + student_id).css({
                            'display': 'inline',
                        });
                        $('.three_' + student_id).css({
                            'display': 'inline',
                        });
                        if(response.res=='fail'){
                            $('#res_' + response.student_id).html(response
                            .res).css({'display':'inline','color':'red','font-weight':'bold'});
                        }
                        else{
                            $('#res_' + response.student_id).html(response
                            .res).css({'display':'inline','color':'rgb(5, 172, 5)','font-weight':'bold'});
                        }
                        $('#gpa_' + response.student_id).html(response
                            .gpa).css({'display':'inline','font-weight':'bold'});
                        $('#grade_' + response.student_id).html(response
                            .grade).css({'display':'inline','font-weight':'bold'});

                    }
            });
             });

            $('.buttonclick').click(function() {
                var student_id = $(this).attr('id');
                var subject_id = $(this).attr('data-val');
                var res = $('#result_' + student_id + subject_id).val();
                var exam = $('.exam').val();
                var year = $('.year').val();
                var class_id = $('.class_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ route('mark_insert') }}",
                    data: {
                        student_id: student_id,
                        subject_id: subject_id,
                        result: res,
                        year: year,
                        exam : exam,
                        class_id : class_id,
                    },
                    success: function(response) {
                        
                        $('.one_' + student_id + subject_id).css({
                            'display': 'inline',
                        });
                        $('.two_' + student_id + subject_id).css({
                            'display': 'inline',
                        });
                        $('.three_' + student_id + subject_id).css({
                            'display': 'inline',
                        });
                        if(response.res=='fail'){
                            $('#res_' + response.student_id + response.subject_id).html(response
                            .res).css({'display':'inline','color':'red','font-weight':'bold'});
                        }
                        else{
                            $('#res_' + response.student_id + response.subject_id).html(response
                            .res).css({'display':'inline','color':'rgb(5, 172, 5)','font-weight':'bold'});
                        }
                        $('#gpa_' + response.student_id + response.subject_id).html(response
                            .gpa).css({'display':'inline','font-weight':'bold'});
                        $('#grade_' + response.student_id + response.subject_id).html(response
                            .grade).css({'display':'inline','font-weight':'bold'});

                    }
                });
            });
        
    });
    </script>
    
    @endif
@endsection
