<?php

namespace App\Http\Controllers;


use App\Person;

use App\Http\Controllers\Interfaces\ControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentsController;

use Illuminate\Http\Request;


class PersonsController extends Controller implements ControllerInterface
{
    public function get() {
        $person = (new Person)->get();
        return view('admin.persons', ['persons' => $person]);
    }

    public function edit($id) {
        $person = (new Person)->where('id', $id)->with('student')->first();
        return view('admin.person.edit', ['person' => $person]);
    }

    public function delete($id) {
        $person = Person::where('id', $id)->first();

        $person->delete();

        return redirect()->route('system.persons')->with(['success' => 'Pessoa excluida com sucesso']);
    }

    public function update(Request $request, $id) {
        $data = $request->only(['name', 'gender', 'birth_date']);
        $person = Person::where('id', $id)->first();
        $data['birth_date'] = $this->getCarbonDate($data['birth_date']);
        $person->fill($data);
        $person->save();

        $makeStudent = $request->get('student');
        if ($makeStudent === 'on') {
            $this->attachStudent($person);
        }

        return redirect()->route('system.persons')->with(['success' => 'Pessoa editada com sucesso']);
    }

    public function insert(Request $request) {
        $data = $request->only(['name', 'gender', 'birth_date']);
        $data['birth_date'] = $this->getCarbonDate($data['birth_date']);

        $person = (new Person);
        $person->fill($data);
        $person->save();
        if ($request->get('student')) {
            $this->attachStudent($person);
        }

        return redirect()->route('system.persons')->with(['success' => 'Pessoa cadastrada com sucesso']);
    }


    public function attachStudent(Person $person) {
        (new StudentsController)->attachPerson($person);
        return $this;
    }

    public function create() {
        return view('admin.person.create');
    }
}