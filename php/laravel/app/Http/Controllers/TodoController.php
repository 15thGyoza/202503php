<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.TodoIndex', compact('todos'));
    }

    public function store(Request $request) {
        $todo = Todo::create($request->only('title'));
        return response()->json($todo, 201);
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return response()->json(null, 204);
    }
}
