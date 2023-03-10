<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolist = Todolist::all();
        return view('home', compact('todolist'));
    }

    public function update(Request $request)
    {
        $todolist = TodoList::find($request->id);
        $todolist->content = $request->content;
        $todolist->save();

        return back();
    }
    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate((['content' => 'required']));

        Todolist::create($data);
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
