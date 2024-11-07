<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'asc')->paginate(5);
        return view('pages.student', ['models' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('pages.create.student-create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'tel' => 'required|max:255',
            'address' => 'required|max:255',
            'image' => 'required|file|mimes:png,jpg,jpeg',
        ]);
        $data = $request->all();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y-m-d') . '_' . time() . '.' . $extension;
            $file->move('image_upload/', $filename);
            $data['image'] = 'image_upload/' . $filename;
        }

        Student::create($data);
        return redirect('/students')->with('success', 'Ma\'lumot qo\'shildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
