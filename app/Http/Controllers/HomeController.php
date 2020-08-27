<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function storeTodo(Request $request)
    {
        $this->validate($request, [
            'todo' => 'required',
        ]);

        $todo = Todo::create([
            'todo' => $request->todo,
            'user_id' => auth()->user()->id,
        ]);

        if($todo){
            return response()->json(['message', 'Todo created successfully']);
        }
    }

    public function getTodosForUser(Request $request)
    {
        $user_id = auth()->user()->id;
        $search = $request->search;

        $todos = Todo::where('user_id', $user_id)
            ->where('todo', 'like', '%'. $search .'%')
            ->paginate(10);

        return response()->json($todos);
    }

    public function removeTodo(Request $request)
    {
        $todo = Todo::destroy($request->id);
        return response()->json($todo);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('edit', compact('todo'));
    }

    public function update($id, Request $request)
    {
        $todo = Todo::find($id)->update([
            'todo' => $request->todo,
        ]);

        return redirect()->route('home');
    }
}
