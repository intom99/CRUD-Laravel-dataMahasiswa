<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::orderBy('major_code', 'asc')->paginate(4);
        $major_count = Major::count();
        return view('majors.index', compact('majors', 'major_count'));
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
            'major_code' => 'required',
            'major_name' => 'required'
        ]);

        Major::create($request->all());
        return redirect('/majors')->with('message', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $request->validate([
            'major_code' => 'required',
            'major_name' => 'required'
        ]);

        Major::where('id', $major->id)
            ->update([
                'major_code' => $request->major_code,
                'major_name' => $request->major_name

            ]);
        return redirect('/majors')->with('message', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        Major::destroy($major->id);
        return redirect('/majors')->with('message', 'Data deleted successfully');
    }
}
