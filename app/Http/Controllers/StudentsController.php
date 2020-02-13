<?php

namespace App\Http\Controllers;

use App\Person;
Use App\Student;

class StudentsController extends Controller {
    public function __construct() {}


    public function attachPerson(Person $person) {
        $student = new Student();

        $student->person()->associate($person);
        $student->save();
    }

    public function getAllStudents() {
        return Student::with('person')->get();
    }

    public function get() {
        return view('admin.students', ['students' => $this->getAllStudents()]);
    }

    public function getById($id) {
        return Student::where('id', $id)->with('team')->first();
    }

    public function delete($id) {
        $this->getById($id)->delete();

        return redirect()->back();
    }

}