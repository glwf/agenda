<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WelcomeController extends Controller
{
    // public function index(){
    //     $data = [
    //         'schedules' => Schedule::all(),
    //     ];
    //     return view('welcome', $data);
    // }

    public function index()
    {
        $tasks = Task::orderBy('start_date', 'desc')->get();
        return view('welcome', compact('tasks'));
    }
    
}
