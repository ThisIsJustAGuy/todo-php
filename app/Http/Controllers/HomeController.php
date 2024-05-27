<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //guest home elérés
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'incomplete_todos' => Todo::query()->where('is_completed', '=', false)->where('user_id', '=', Auth::id())->get(),
            'complete_todos' => Todo::query()->where('is_completed', '=', true)->where('user_id', '=', Auth::id())->get(),
        ]);
    }
}
