@extends('layouts.master')
@section('title') เพิ่มข้อมูลวิชา | มหาวิทยาลัยเนินหอม @stop
@section('content')
{{
    Form::open(array('method' => 'POST',
            'enctype' => 'multipart/form-data',
            'action' => 'App\Http\Controllers\SubjectController@create'))  
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
            <strong>เพิ่มข้อมูลวิชา</strong>
        </div>
    </div>

    <div class="panel-body">
        <table class="table tabler-bordered">
            <caption>
                <h1>เพิ่มข้อมูลวิชา</h1>
            </caption>
            <tr>
                <td> {{ Form::label('subject_id', 'รหัสวิชา') }} </td>
                <td> {{ Form::text('subject_id', Request::old('subject_id'), ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('name', 'ชื่อวิชา') }} </td>
                <td> {{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }} </td>
            </tr>
        </table>
    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ URL::to('subject/') }}" class="btn btn-danger">ยกเลิก</a>
    </div>
</div>
{{ Form::close() }}
@endsection