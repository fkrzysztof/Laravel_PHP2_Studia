<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function showAll()
    {
        $students = Student::all();
        return view('students.showAll', ['students' => $students]);
    }

    public function edit($id)
    {
        if($id != -1) $student = Student::find($id);
        else $student = new Student(['id'=>-1, 'imie'=>'', 'nazwisko'=>'']);
        return view('students.edit', ['student'=>$student]);
    }

    public function update(Request $request, $id)
    {
        if($id != -1)
            $student = Student::find($id);
        else
            $student = new Student(['id'=>null, 'imie'=>'', 'nazwisko'=>'']);

        $student->imie = $request->get('imie');
        $student->nazwisko = $request->get('nazwisko');
        $student->save();
        return redirect('/studenci');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/studenci');
    }

}
