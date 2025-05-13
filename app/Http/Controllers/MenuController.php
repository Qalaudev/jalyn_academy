<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Menu;
use App\Models\TrainingProgram;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $trainingPrograms = TrainingProgram::select('id', 'name')->get();
        return view('admin.menu.create', compact('trainingPrograms'));
    }

    public function store(Request $request,Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'trainingProgram' => 'required'
        ]);

        $menu = Menu::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'training_program_id' => $validated['trainingProgram'],
        ]);

        return redirect()->back()->with('success', 'Меню успешно сохранено!');
    }


}
