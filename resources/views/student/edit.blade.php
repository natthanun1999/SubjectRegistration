@extends('layouts.master')
@section('title') แก้ไขข้อมูลนักศึกษา | มหาวิทยาลัยเนินหอม @stop
@section('content')
{{
    Form::model($student, array('method' => 'POST',
            'enctype' => 'multipart/form-data',
            'action' => 'App\Http\Controllers\StudentController@update'))  
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
            <strong>แก้ไขข้อมูลนักศึกษา</strong>
        </div>
    </div>

    <div class="panel-body">
        <input type="hidden" name="id" value="{{ $student->id }}">

        <table class="table tabler-bordered">
            <caption>
                <h1>แก้ไขข้อมูลนักศึกษา</h1>
            </caption>
            <tr>
                <td> {{ Form::label('stdID', 'รหัสนักศึกษา') }} </td>
                <td> {{ Form::text('stdID', $student->stdID, ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('firstname', 'ชื่อ') }} </td>
                <td> {{ Form::text('firstname', $student->firstname, ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('lastname', 'นามสกุล') }} </td>
                <td> {{ Form::text('lastname', $student->lastname, ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('subject_id', 'รายชื่อวิชา') }} </td>
                <td> {{ Form::select('subject_id', $subjects, Request::old('subject_id'), ['class' => 'form-control']) }} </td>
            </tr>

            @if ($student->image_url)
                <tr>
                    <td><strong>รูปนักศึกษา</strong></td>
                    <td><img src="{{ URL::to($student->image_url) }}" alt="Student Image"></td>
                </tr>
            @endif

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