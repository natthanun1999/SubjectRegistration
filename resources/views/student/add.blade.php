@extends('layouts.master')
@section('title') เพิ่มข้อมูลนักศึกษา | มหาวิทยาลัยเนินหอม @stop
@section('content')
{{
    Form::open(array('method' => 'POST',
            'enctype' => 'multipart/form-data',
            'action' => 'App\Http\Controllers\StudentController@create'))  
}}

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>เพิ่มข้อมูลนักศึกษา</strong>
        </div>
    </div>

    <div class="panel-body">
        <table class="table tabler-bordered">
            <caption>
                <h1>เพิ่มข้อมูลนักศึกษา</h1>
            </caption>
            <tr>
                <td> {{ Form::label('stdID', 'รหัสนักศึกษา') }} </td>
                <td> {{ Form::text('stdID', Request::old('stdID'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('firstname', 'ชื่อ') }} </td>
                <td> {{ Form::text('firstname', Request::old('firstname'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('lastname', 'นามสกุล') }} </td>
                <td> {{ Form::text('lastname', Request::old('lastname'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('subject_id', 'รายชื่อวิชา') }} </td>
                <td> {{ Form::select('subject_id', $subjects, Request::old('subject_id'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('image', 'เลือกรูปภาพนักศึกษา') }} </td>
                <td> {{ Form::file('image') }} </td>
            </tr>
        </table>
    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ URL::to('student/') }}" class="btn btn-danger">ยกเลิก</a>
    </div>
</div>
{{ Form::close() }}
@endsection