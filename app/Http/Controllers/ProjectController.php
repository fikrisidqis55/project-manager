<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        Project::create($request->validate([
                'name'=> 'required',
        ]));
        return redirect()->route('projects.index');
    } 

    public function edit(Project $project){
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project, Request $request){
        $project->update($request->validate([
            'name'=> 'required',
        ]));
        return redirect()->route('projects.index');
    }

    public function show(Project $project){
        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project){
        $project->delete();
        return redirect()->route('projects.index');
    }
}


