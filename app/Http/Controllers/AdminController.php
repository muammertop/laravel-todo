<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        if (!$request->all() == null) {

            $todos = Todo::Where('user_id', $request->user)
                ->get();

        } else {
            $todos = Todo::all();
        }

        return view('admin.index', compact('todos', 'users'));
    }
}
