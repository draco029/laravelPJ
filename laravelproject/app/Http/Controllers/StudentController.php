<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;
//student folder out mhr shi tk index.php ko return 
use Illuminate\Http\Request;
use Illuminate\Http\Redirectresponse;
use Illuminate\Http\Response;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        // $students = Student::all();
        $students = Student::paginate(10);
        return view('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
         return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) :RedirectResponse
    {
       $input=$request->all();
       Student :: create($input);
       return redirect('students')->with('message','Data Insert Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id):View
    {
        $students= Student::find($id);
        return view('students.show')->with('students',$students); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id):RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('message','Delete Successful');
    }
}
