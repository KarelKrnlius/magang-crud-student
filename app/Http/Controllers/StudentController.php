<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('name')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:3|max:100',
            'gender' => 'required|in:L,P',
            'phone'  => 'nullable|max:15',
            'school' => 'required|max:150',
        ]);


        Student::create([
            'name'   => $request->name,
            'gender' => $request->gender,
            'phone'  => $request->phone,
            'school' => $request->school,
            'active' => true,
        ]);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan!');
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
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'   => 'required|min:3|max:100',
            'gender' => 'required|in:L,P',
            'phone'  => 'nullable|max:15',
            'school' => 'required|max:150',
            'active' => 'required|boolean',
        ]);

        $student->update([
            'name'   => $request->name,
            'gender' => $request->gender,
            'phone'  => $request->phone,
            'school' => $request->school,
            'active' => $request->active,
        ]);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $nama = $student->name;  // Simpan nama sebelum dihapus
        $student->delete();

        return redirect()->route('students.index')->with('success', "Data siswa '{$nama}' berhasil dihapus!");
    }
}
