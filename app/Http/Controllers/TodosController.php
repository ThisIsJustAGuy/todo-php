<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodosController extends Controller
{
    public function create(){
        return view('todos.edit');
    }

    public function store(TodoRequest $request) {
        $validated = $request->validated();
        $validated['is_completed'] = false;
        Todo::query()->create($validated);
        return redirect()->route('home');
    }

    public function edit(Todo $todo){
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, Todo $todo) {
        $modified['content'] = $request->validated()['content'];
        $todo->update($modified);
        return redirect()->route('home');
    }

    public function complete(Todo $todo){
        $todo->update(['is_completed' => true]);
        return redirect()->route('home');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->route('home');
    }
}
