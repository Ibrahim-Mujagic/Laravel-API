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

        return response()->json($project);
    }

}
