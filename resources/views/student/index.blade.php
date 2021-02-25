@extends('layouts.master')
@section('title') รายชื่อนักศึกษา | มหาวิทยาลัยเนินหอม @stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>รายชื่อนักศึกษา</strong>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ URL::to('student/search') }}" class="form-inline" method="POST">
            @csrf
            <input type="text" name="q" class="form-control" placeholder="ค้นหา">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="{{ URL::to('student/add') }}" class="btn btn-success pull-right">เพิ่มนักศึกษา</a>
        </form>
    </div>
    <table class="table table-bordered table-striped bs-table">
        <thead>
            <tr>
                <th>รูปนักศึกษา</th>
                <th>รหัสนักศึกษา</th>
                <th>ชื่อ</th>
                <th>วิชาเอกที่ลงทะเบียน</th>
                <th>การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $std)
            <tr>
                <td><img src="{{ $std->image_url }}" width="50px"></td>
                <td>{{ $std->stdID }}</td>
                <td>{{ $std->firstname }} {{ $std->lastname }}</td>
                <td>{{ $std->subject->name }}</td>
                <td class="bs-center">
                    <a href="#" class="btn btn-warning edit" id-edit={{ $std->id }}>แก้ไข</a>
                    <a href="#" class="btn btn-danger delete" id-delete="{{ $std->id }}">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="panel-footer">
        <span>แสดงข้อมูลจำนวน {{ count($students) }} ข้อมูล</span>
    </div>
</div>

<script>
    $('.edit').on('click', function () {
        var url = "{{ URL::to('student/edit') }}" + "/" + $(this).attr('id-edit')
        window.location.href = url
    })

    $('.delete').on('click', function () {
        if (confirm('คุณต้องการลบข้อมูลสินค้าหรือไม่ ?')) {
            var url = "{{ URL::to('student/remove') }}" + "/" + $(this).attr('id-delete')
            window.location.href = url
        }
    })
</script>
@endsection