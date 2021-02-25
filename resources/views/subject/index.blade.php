@extends('layouts.master')
@section('title') รายชื่อวิชา | มหาวิทยาลัยเนินหอม @stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>รายชื่อวิชา</strong>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('subject/search') }}" class="form-inline" method="POST">
            @csrf
            <input type="text" name="q" class="form-control" placeholder="ค้นหา">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="{{ URL::to('subject/add') }}" class="btn btn-success pull-right">เพิ่มรายวิชา</a>
        </form>
    </div>
    <table class="table table-bordered table-striped bs-table">
        <thead>
            <tr>
                <th>รหัสวิชา</th>
                <th>ชื่อ</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->subject_id }}</td>
                <td>{{ $subject->name }}</td>
                <td class="bs-center">
                    <a href="#" class="btn btn-warning edit" id-edit={{ $subject->id }}>แก้ไข</a>
                    <a href="#" class="btn btn-danger delete" id-delete="{{ $subject->id }}">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="panel-footer">
        <span>แสดงข้อมูลจำนวน {{ count($subjects) }} ข้อมูล</span>
    </div>
</div>

<script>
    $('.edit').on('click', function () {
        var url = "{{ URL::to('subject/edit') }}" + "/" + $(this).attr('id-edit')
        window.location.href = url
    })

    $('.delete').on('click', function () {
        if (confirm('คุณต้องการลบข้อมูลวิชาหรือไม่ ?')) {
            var url = "{{ URL::to('subject/remove') }}" + "/" + $(this).attr('id-delete')
            window.location.href = url
        }
    })
</script>
@endsection