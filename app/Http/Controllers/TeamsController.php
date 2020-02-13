<?php

namespace App\Http\Controllers;


use App\Team;

use App\Http\Controllers\Interfaces\ControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentsController;

use Illuminate\Http\Request;

class TeamsController extends Controller implements ControllerInterface
{
    public function get() {
        $team = (new Team)->get();
        return view('admin.teams', ['teams' => $team]);
    }

    public function edit($id) {
        $team = (new Team)->with('students')->with('students')->where('id', $id)->first();
        $students = (new StudentsController)->getAllStudents();
        return view('admin.team.edit', ['team' => $team, 'students' => $students]);
    }

    public function delete($id) {
        $team = Team::where('id', $id)->first();

        $team->delete();

        return redirect()->route('system.teams')->with(['success' => 'Turma excluida com sucesso']);
    }


    public function update(Request $request, $id) {
        $data = $request->only(['name']);
        $team = Team::where('id', $id)->first();
        $team->fill($data);
        $team->save();

        return redirect()->route('system.teams')->with(['success' => 'Turma editada com sucesso']);
    }

    public function insert(Request $request) {
        $data = $request->only(['name']);

        $team = (new Team);
        $team->fill($data);
        $team->save();

        return redirect()->route('system.teams')->with(['success' => 'Turma cadastrada com sucesso']);
    }

    public function create() {
        return view('admin.team.create');
    }

    public function dontHaveStudent($team, $student) {
        return $student->team === null;
    }

    public function attachStudent(Request $request, $id) {
        $stuId = $request->get('student');
        $team = Team::where('id', $id)->with('students')->first();

        $student = (new StudentsController)->getById($stuId);
        $message = 'Esse aluno já está em uma turma';
        if ($this->dontHaveStudent($team, $student)) {
            $message = '';
            $team->students()->save($student);
        }
        \Session::flash('message', $message);
        \Session::flash('messageClass', strlen($message) > 0 ?  'danger' : 'success');
        return redirect(route('system.teams.edit', $id) . '#alunos');
    }

    public function detachStudent($teamId, $studentId) {
        
        $student = (new StudentsController)->getById($studentId);
        $student->team_id = null;
        $student->save();

        return redirect(route('system.teams.edit', $teamId) . '#alunos');
    }
}