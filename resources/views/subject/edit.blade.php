@extends('layouts.master')
@section('title') แก้ไขข้อมูลวิชา | มหาวิทยาลัยเนินหอม @stop
@section('content')
{{
    Form::model($subject, array('method' => 'POST',
            'enctype' => 'multipart/form-data',
            'action' => 'App\Http\Controllers\SubjectController@update'))  
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
            <strong>แก้ไขข้อมูลวิชา</strong>
        </div>
    </div>

    <div class="panel-body">
        <input type="hidden" name="id" value="{{ $subject->id }}">

        <table class="table tabler-bordered">
            <caption>
                <h1>แก้ไขข้อมูลวิชา</h1>
            </caption>
            <tr>
                <td> {{ Form::label('subject_id', 'รหัสวิชา') }} </td>
                <td> {{ Form::text('subject_id', $subject->subject_id, ['class' => 'form-control']) }} </td>
            </tr>
            <tr>
                <td> {{ Form::label('name', 'ชื่อวิชา') }} </td>
                <td> {{ Form::text('name', $subject->name, ['class' => 'form-control']) }} </td>
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