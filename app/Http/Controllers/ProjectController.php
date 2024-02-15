<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\Partner;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {

        $projects=Project::all();
        $status = project::STATUS_RADIO;

        return view('admin.projects.project',['projects'=>$projects],['status'=>$status]);
    }
    public function create()
    {
        $status = project::STATUS_RADIO;
        $partners=Partner::all();

        return view('admin.projects.create',['partners'=>$partners],['status'=>$status]);
    }

    public function store(ProjectStoreRequest $request)
    {

        $project=Project::create($request->all());

        if ($request->hasFile('image')) {
            $project->addMediaFromRequest('image')->toMediaCollection('images');
        }
        $project->save();

        return redirect()->route('projects');

    }
    public function edit(Project $project){

        $partners=Partner::all();
        $projects=Project::all();

        return view('admin.projects.update',['project'=>$project],['partners'=>$partners]);

    }

        public function update(ProjectUpdateRequest $request, Project $project)
        {
            $project->update($request->all());

            if ($request->hasFile('image')) {
                $project->clearMediaCollection('images');
                $project->addMediaFromRequest('image')->toMediaCollection('images');
            }

            $project->save();
            return redirect()->route('projects');
        }


        public function destroy(Project $project)
        {


        }

        public function dashadmin()
        {
             $partners=Partner::all();
             $projects=Project::all();
             return view('admin.DashAdmin',['partners'=>$partners],['projects'=>$projects]);
        }

        public function home(){

             $projects=Project::all();
             return view('index',compact('projects'));
        }
}
