<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('student/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array(
            'stdID'      => $request->stdID,
            'firstname'  => $request->firstname,
            'lastname'   => $request->lastname,
            'subject_id' => $request->subject_id
        );

        $rule = array(
            'stdID'      => 'required|numeric',
            'firstname'  => 'required',
            'lastname'   => 'required',
            'subject_id' => 'required|numeric'
        );

        $message = array(
            'required' => 'กรุณากรอก :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอก :attribute เป็นตัวเลข'
        );

        $validator = Validator::make($data, $rule, $message);

        if ($validator->fails()) {
            return redirect('student/add')
                    ->withErrors($validator)
                    ->withInput();
        }

        $student = new Student();
        $student->stdID = $request->stdID;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->subject_id = $request->subject_id;

        if ($request->hasFile('image')) {
            $f = $request->file('image');

            $upload_to = 'upload/images';

            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;

            $f->move($absolute_path, $f->getClientOriginalName());
            $student->image_url = $relative_path;
        }

        $student->save();

        return redirect('student')
                ->with('ok', true)
                ->with('msg', 'เพิ่มข้อมูลนักศึกษาเรียบร้อย');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for add the specified resource.
     */
    public function add()
    {
        $subjects = Subject::pluck('name', 'id')->prepend('เลือกรายการ', '');

        return view('student/add')->with('subjects', $subjects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        //$student = Student::find($id);
        $student = Student::where('id', $id)->first();
        $subjects = Subject::pluck('name', 'id')->prepend('เลือกรายการ', '');

        return view('student/edit')
                ->with('student', $student)
                ->with('subjects', $subjects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array(
            'stdID'      => $request->stdID,
            'firstname'  => $request->firstname,
            'lastname'   => $request->lastname,
            'subject_id' => $request->subject_id
        );

        $rule = array(
            'stdID'      => 'required|numeric',
            'firstname'  => 'required',
            'lastname'   => 'required',
            'subject_id' => 'required|numeric'
        );

        $message = array(
            'required' => 'กรุณากรอก :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอก :attribute เป็นตัวเลข'
        );

        $validator = Validator::make($data, $rule, $message);

        if ($validator->fails()) {
            return redirect('student/edit'.$request->id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $student = Student::find($request->id);
        $student->stdID = $request->stdID;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->subject_id = $request->subject_id;

        if ($request->hasFile('image')) {
            $f = $request->file('image');

            $upload_to = 'upload/images';

            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;

            $f->move($absolute_path, $f->getClientOriginalName());
            $student->image_url = $relative_path;
        }

        $student->save();

        return redirect('student')
                ->with('ok', true)
                ->with('msg', 'แก้ข้อมูลนักศึกษาเรียบร้อย');
    }

    /**
     * Search the specified resource in storage.
     */
    public function search(Request $request)
    {
        $query = $request->q;

        if ($query) {
            $students = Student::where('stdID', 'like', '%'.$query.'%')
            ->orWhere('firstname', 'like', '%'.$query.'%')
            ->orWhere('lastname', 'like', '%'.$query.'%')->get();
        } else {
            $students = Student::all();
        }

        return view('student/index', compact('students'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove($id)
    {
        Student::find($id)->delete();

        return redirect('student')
            ->with('ok', true)
            ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
