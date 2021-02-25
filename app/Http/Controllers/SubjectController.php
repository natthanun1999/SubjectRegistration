<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subject/index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array(
            'subject_id' => $request->subject_id,
            'name'       => $request->name,
        );

        $rule = array(
            'subject_id' => 'required',
            'name'       => 'required'
        );

        $message = array(
            'required' => 'กรุณากรอก :attribute ให้ครบถ้วน'
        );

        $validator = Validator::make($data, $rule, $message);

        if ($validator->fails()) {
            return redirect('subject/add')
                    ->withErrors($validator)
                    ->withInput();
        }

        $subject = new Subject();
        $subject->subject_id = $request->subject_id;
        $subject->name = $request->name;

        $subject->save();

        return redirect('subject')
                ->with('ok', true)
                ->with('msg', 'เพิ่มข้อมูลวิชาเรียบร้อย');
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for add the specified resource.
     */
    public function add()
    {
        return view('subject/add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        //$subject = Subject::find($id);
        $subject = Subject::where('id', $id)->first();

        return view('subject/edit')
                ->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array(
            'subject_id' => $request->subject_id,
            'name'       => $request->name,
        );

        $rule = array(
            'subject_id' => 'required',
            'name'       => 'required'
        );

        $message = array(
            'required' => 'กรุณากรอก :attribute ให้ครบถ้วน'
        );

        $validator = Validator::make($data, $rule, $message);

        if ($validator->fails()) {
            return redirect('subject/edit/'.$request->id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $subject = Subject::find($request->id);
        $subject->subject_id = $request->subject_id;
        $subject->name = $request->name;

        $subject->save();

        return redirect('subject')
                ->with('ok', true)
                ->with('msg', 'แก้ไขข้อมูลวิชาเรียบร้อย');
    }

    /**
     * Search the specified resource in storage.
     */
    public function search(Request $request)
    {
        $query = $request->q;

        if ($query) {
            $subjects = Subject::where('subject_id', 'like', '%'.$query.'%')
            ->orWhere('name', 'like', '%'.$query.'%')->get();
        } else {
            $subjects = Subject::all();
        }

        return view('subject/index', compact('subjects'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove($id)
    {
        Subject::find($id)->delete();

        return redirect('subject')
            ->with('ok', true)
            ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
