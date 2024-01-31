<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
       $data = $request->all();

        if(array_key_exists('cover_image',$data)){
            $data['original_image_name'] = $request->file('cover_image')->getClientOriginalName();
            $data['cover_image'] = Storage::put('uploads',$data['cover_image']);
        }

        $newProject = new Project();
        $data['slug'] = Project::generateSlug($data['name']);
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.show',$newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->all();
        if ($data['name']!= $project->name) {
            $data['slug'] = Project::generateSlug($data['name']);
        }else{
            $data['slug'] = $project->slug;
        }
        
        if (array_key_exists('cover_image',$data)) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['original_image_name'] = $request->file('cover_image')->getClientOriginalName();
            $data['cover_image'] = Storage::put('uploads',$data['cover_image']);
        }

        $project->update($data);
        
        return redirect()->route('admin.projects.show',$project);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index'); 
    }
}
