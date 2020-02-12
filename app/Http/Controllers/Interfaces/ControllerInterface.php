<?php 

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface ControllerInterface {
    public function get();

    public function edit($id);

    public function delete($id);

    public function insert(Request $request);

    public function create();

    public function update(Request $request, $id);
}