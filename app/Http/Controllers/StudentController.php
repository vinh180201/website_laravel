<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::select('id', 'name', 'address', 'birthday', 'age')->get();

        return view('/pages/students/student', [
            'students' => $students,
            'msg' => "Success"
        ]);
    }

    public function store(Request $request)
    {
        $storeStudent = new Student();
        $storeStudent->id = null;
        $storeStudent->name = $request->name;
        $storeStudent->address = $request->address;
        $storeStudent->birthday = $request->birthday;
        $storeStudent->age = $request->age;
        $storeStudent->save();

        return redirect('/student');
    }

    public function update(Request $request, $id)
    {
        $storeStudent = Student::find($id);
        if (!is_null($request->name)) {
            $storeStudent->name = $request->name;
        }
        if (!is_null($request->address)) {
            $storeStudent->address = $request->address;
        }
        if (!is_null($request->birthday)) {
            $storeStudent->birthday = $request->birthday;
        }
        if (!is_null($request->age)) {
            $storeStudent->age = $request->age;
        }

        $storeStudent->save();

        return redirect('/student');
    }

    public function destroy($id)
    {
        if (Student::where('id', '=', $id)->exists()) {
            $student = Student::where('id', '=', $id)->limit(1);
            $student->delete();
        }
        return redirect('/student');
    }

    public function find(Request $request)
    {
        if ($request->sort == "name") {
            $students = Student::where('name', 'like', "%$request->value%")
                ->get();

        } elseif ($request->sort == "age") {
            $students = Student::where('age', '>=', $request->value)
                ->get();
        } elseif ($request->sort == "month") {
            $students = Student::whereMonth('birthday', '=', $request->value)
                ->get();
        } else {
            return response()->json('Not Found', 404);
        }
        return view('/pages/students/student', [
            'sort' => $request->sort,
            'value' => $request->value,
            'students' => $students,
            'msg' => "Success"
        ]);
    }

    public function create(Request $request)
    {
        return view('pages.students.add');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);
        return view('pages.students.edit', ['student' => $student]);
    }
}
