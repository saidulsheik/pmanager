<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\Company;
use App\Model\ProjectStatus;
use App\Model\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //  $this->middleware('Auth');
    }

    public function index()
    {
        if( Auth::check()){
            $project=[];
            $types=ProjectType::all();
            $statuses=ProjectStatus::all();
            $projects = Project::all();
            $companies = Company::all();
            return view('project.index', [
                    'projects'=>$projects,
                    'project'=>$project, 
                    'companies'=>$companies,
                    'types'=>$types,
                    'statuses'=>$statuses,
                 ]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
           // dd($request);
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id'=>$request->input('company_id'),
                'start_date'=>$request->input('start_date'),
                'end_date'=>$request->input('end_date'),
                'progress'=>$request->input('progress'),
                'user_id' => Auth::user()->id,
            ]);
            if($project){
                return redirect()->route('project.index', ['project'=> $project->id])
                ->with('success' , 'Project created successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error creating new Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        if( Auth::check() ){
            $companies = Company::all();
            $projects = Project::all();
            $types=ProjectType::all();
            $status=ProjectStatus::all();
            $project=Project::find($project->id);
            return view('project.index',  [
                    'project'=>$project,
                    'projects'=>$projects,
                    'companies'=>$companies,
                    'types'=>$types,
                    'status'=>$status,
                ]);
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if( Auth::check() ){
            $projectUpdate=Project::where('id', $project->id)->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id'=>$request->input('company_id'),
                'start_date'=>$request->input('start_date'),
                'end_date'=>$request->input('end_date'),
                'progress'=>$request->input('progress'),
                'added_by' => Auth::user()->id,
            ]);
            if($projectUpdate){
                return redirect()->route('project.index', ['project'=>$project->id])
                ->with('success' , "Project Updated successfully");
            }
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
