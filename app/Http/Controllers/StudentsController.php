<?php

namespace App\Http\Controllers;

use App\Student;
use App\Major;
use App\Course;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'asc')->paginate(4);
        $student_count = Student::count();
        $major_list = Major::all()->sortBy('major_code');
        $course_list = Course::all();
        return view('students.index', compact('students', 'student_count', 'major_list', 'course_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'course_id' => 'required',
            'major_id' => 'required'
        ]);

        Student::create($request->all());
        return redirect('/students')->with('message', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $major_list = Major::all()->sortBy('major_code');
        $course_list = Course::all();
        return view('students.show', compact('student', 'major_list', 'course_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'course_id' => 'required',
            'major_id' => 'required'
        ]);

        Student::where('id', $student->id)->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'course_id' => $request->course_id,
            'major_id' => $request->major_id
        ]);


        return redirect('/students')->with('message', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

        Student::destroy($student->id);
        return redirect('/students')->with('message', 'Data student deleted successfully');
    }
}
