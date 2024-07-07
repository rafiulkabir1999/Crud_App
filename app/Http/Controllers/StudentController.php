<?php

namespace App\Http\Controllers;

use App\Models\Studnet;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Studnet::all();
        return view('student.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Studnet();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        // $student->s_id = $request->id;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student created successfully!');
        //return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Studnet::findOrFail($id);
        return view('student.edit' , compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student = Studnet::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Studnet::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success','Student Delete Successfully');
    }


    //API
    public function getStudents()
    {
       $student = Studnet::all();
       if(!empty($student)){
        $result = array('status'=>true,'message'=>'Get All student successfully','data'=>$student);
        return response()->json($result,200);
       }
       else{
        $result = array('status'=> false,'message'=>'Failed getting student');
        return response()->json($result,400);
       }
    }

    
    public function getStudentsById(string $id)
    {
       $student = Studnet::findOrFail($id);
       if($student->id){
        $result = array('status'=>true,'message'=>'Get student successfully','data'=>$student);
        return response()->json($result,200);
       }
       else{
        $result = array('status'=> false,'message'=>'Failed getting student');
        return response()->json($result,400);
       }
    }
}
