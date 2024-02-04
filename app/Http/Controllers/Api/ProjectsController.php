<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Techs;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::all();
        return response()->json($projects);
    }

    public function show($slug){
        $project = Project::where('slug',$slug)->with(['category','techs'])->first();
        if ($project->cover_image) {
            $project->cover_image = url('storage/'.$project->cover_image);
        }else{
            $project->cover_image = url('storage/uploads/placeholder-img.jpeg');
        }

        return response()->json($project);
    }

}
