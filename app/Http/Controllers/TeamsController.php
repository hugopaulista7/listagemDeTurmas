<?php

namespace App\Http\Controllers;


use App\Team;

use App\Http\Controllers\Interfaces\ControllerInterface;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class TeamsController extends Controller implements ControllerInterface
{
    public function get() {
        $team = (new Team)->get();
        return view('admin.teams', ['teams' => $team]);
    }

    public function edit($id) {
        $team = (new Team)->where('id', $id)->first();
        return view('admin.team.edit', ['team' => $team]);
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
}