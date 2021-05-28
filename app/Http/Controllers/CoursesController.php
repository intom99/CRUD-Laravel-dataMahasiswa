<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Course::all()->sortBy('course_name');
        $courses = Course::orderBy('no_course', 'asc')->paginate(10);
        $course_count = Course::count();
        // $course_list = Course::orderBy('course_name', 'desc')->paginate(5);
        return view('courses.index', compact('courses', 'course_count'));
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
            'no_course' => 'required',
            'course_name' => 'required',
            'sks' => 'required',
            'semester' => 'required'
        ]);
        Course::create($request->all());
        return redirect('courses')->with('message', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'no_course' => 'required',
            'course_name' => 'required',
            'sks' => 'required',
            'semester' => 'required'
        ]);

        Course::where('id', $course->id)
            ->update([
                'no_course' => $request->no_course,
                'course_name' => $request->course_name,
                'sks' => $request->sks,
                'semester' => $request->semester
            ]);
        return redirect('/courses')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        return redirect('/courses')->with('message', 'Data deleted successfully');
    }
}
