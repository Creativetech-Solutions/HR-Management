<?php

namespace App\Http\Controllers\Projects;

use App\model\Clients;
use App\model\Milestone;
use App\model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;  // call user model
use App\model\Project;
use Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Projects extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('projects.view');
    }
    public function getData() // get data form user table
    {
        $projects = DB::table('users as us')
            ->leftjoin('clients as cl','cl.user_id','=','us.id')
            ->rightjoin('projects as pro','pro.client_id','=','cl.id')
            ->leftjoin('users as em','em.id','=','pro.project_manager')
            ->select('pro.id','pro.name as pro_name','us.name as client_name','pro.project_status','pro.start_date','pro.due_date','em.name as emp_name','pro.payment_status as payment_status');
            $data = Datatables::of($projects)
            ->escapeColumns()
            ->addColumn('action', function ($projects) {
                return '<a href="' . route("projects.dashboard", $projects->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                        <a href="' . route("projects.edit", $projects->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-content="">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('project_status',function($projects){
                if($projects->project_status == 1){
                    return '<span class="project_status btn btn-xs btn-light-azure" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">Active</span>';
                }else if($projects->project_status == 2) {
                     return '<span class="project_status btn btn-xs btn-dark-blue"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">OnHold</span>';
                }else if($projects->project_status == 3) {
                     return '<span class="project_status btn btn-xs btn-success"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">Completed</span>';
                }else if($projects->project_status == 4) {
                     return '<span class="project_status btn btn-xs  btn-dark-red"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'"  data-status="'.$projects->project_status.'">Drop</span>';
                }
            })->addColumn('payment_status',function($projects){
                if($projects->payment_status == 1){
                    return '<span class="project_pay_status btn btn-xs btn-dark-red" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Pending</span>';
                }else if($projects->payment_status == 2) {
                     return '<span class="project_pay_status btn btn-xs btn-dark-blue"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">InComplete</span>';
                }else if($projects->payment_status == 3) {
                     return '<span class="project_pay_status btn btn-xs btn-success"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'"data-status="'.$projects->payment_status.'">Paid</span>';
                }else if($projects->payment_status == 4) {
                     return '<span class="project_pay_status btn btn-xs btn-orange"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Cancelled</span>';
                }
            })
            ->rawColumns(array("action","project_status","payment_status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function getData_me($id) // get data form Projects fro Developer profile
    {
        $projects = DB::table('users as us')
            ->leftjoin('clients as cl','cl.user_id','=','us.id')
            ->rightjoin('projects as pro','pro.client_id','=','cl.id')
            ->leftjoin('users as em','em.id','=','pro.project_manager')
            ->where('em.id','=',$id)
            ->select('pro.id','pro.name as pro_name','us.name as client_name','pro.project_status','pro.start_date','pro.due_date','em.name as emp_name','pro.payment_status as payment_status');
            $data = Datatables::of($projects)
            ->escapeColumns()
            ->addColumn('action', function ($projects) {
                return '<a href="' . route("projects.edit", $projects->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-content="">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('project_status',function($projects){
                if($projects->project_status == 1){
                    return '<span class="project_status btn btn-xs btn-light-azure" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">Active</span>';
                }else if($projects->project_status == 2) {
                     return '<span class="project_status btn btn-xs btn-dark-blue"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">OnHold</span>';
                }else if($projects->project_status == 3) {
                     return '<span class="project_status btn btn-xs btn-success"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">Completed</span>';
                }else if($projects->project_status == 4) {
                     return '<span class="project_status btn btn-xs  btn-dark-red"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'"  data-status="'.$projects->project_status.'">Drop</span>';
                }
            })->addColumn('payment_status',function($projects){
                if($projects->payment_status == 1){
                    return '<span class="project_pay_status btn btn-xs btn-dark-red" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Pending</span>';
                }else if($projects->payment_status == 2) {
                     return '<span class="project_pay_status btn btn-xs btn-dark-blue"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">InComplete</span>';
                }else if($projects->payment_status == 3) {
                     return '<span class="project_pay_status btn btn-xs btn-success"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'"data-status="'.$projects->payment_status.'">Paid</span>';
                }else if($projects->payment_status == 4) {
                     return '<span class="project_pay_status btn btn-xs btn-orange"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Cancelled</span>';
                }
            })
            ->rawColumns(array("action","project_status","payment_status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function getData_for_cl($id) // get data form Projects fro Client profile
    {
        $projects = DB::table('users as us')
            ->leftjoin('clients as cl','cl.user_id','=','us.id')
            ->rightjoin('projects as pro','pro.client_id','=','cl.id')
            ->leftjoin('users as em','em.id','=','pro.project_manager')
            ->where('cl.id','=',$id)
            ->select('pro.id','pro.name as pro_name','us.name as client_name','pro.project_status','pro.start_date','pro.due_date','em.name as emp_name','pro.payment_status as payment_status');
            $data = Datatables::of($projects)
            ->escapeColumns()
            ->addColumn('action', function ($projects) {
                return '<a href="' . route("projects.edit", $projects->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-content="">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('project_status',function($projects){
                if($projects->project_status == 1){
                    return '<span class="project_status btn btn-xs btn-light-azure" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">Active</span>';
                }else if($projects->project_status == 2) {
                     return '<span class="project_status btn btn-xs btn-dark-blue"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">OnHold</span>';
                }else if($projects->project_status == 3) {
                     return '<span class="project_status btn btn-xs btn-success"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->project_status.'">Completed</span>';
                }else if($projects->project_status == 4) {
                     return '<span class="project_status btn btn-xs  btn-dark-red"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'"  data-status="'.$projects->project_status.'">Drop</span>';
                }
            })->addColumn('payment_status',function($projects){
                if($projects->payment_status == 1){
                    return '<span class="project_pay_status btn btn-xs btn-dark-red" data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Pending</span>';
                }else if($projects->payment_status == 2) {
                     return '<span class="project_pay_status btn btn-xs btn-dark-blue"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">InComplete</span>';
                }else if($projects->payment_status == 3) {
                     return '<span class="project_pay_status btn btn-xs btn-success"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'"data-status="'.$projects->payment_status.'">Paid</span>';
                }else if($projects->payment_status == 4) {
                     return '<span class="project_pay_status btn btn-xs btn-orange"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Cancelled</span>';
                }
            })
            ->rawColumns(array("action","project_status","payment_status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'Add Project';
        $action_url ='projects/store';
        $skills     = DB::table('skills')->get();
        $client     = DB::table('clients as cl')->select('us.name','cl.id')->leftJoin('users as us', 'cl.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $employee   = DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency   =  Countries::all();
        $projects   = " ";
        return view('projects.add_projects', [
            'title'     =>$title,
            'action_url'=>$action_url,
            'client'    =>$client,
            'employee'  =>$employee,
            'skills'    => $skills,
            'currency'  => $currency,
            'projects'  => $projects,
         ]);
    }
    public function store(Request $request)
    {
        $project_manager = $request->project_manager;
        $developer      = !empty($request->developers) ? implode(',',$request->developers): " ";
        $pos = strpos($developer,$project_manager);
        if(!empty($pos)){
            $developer      = $developer;
        }else{
            $developer      = $developer.",$project_manager";
        }

        $Last_array = Project::create([
            'name'               => $request->name,
            'budget'             => $request->budget,
            'project_manager'    => $project_manager,
            'description'        => $request->description,
            'required_skills'    => !empty($request->required_skills) ? implode(',',$request->required_skills): " ",
            'developers'         => $developer,
            'project_status'     => $request->project_status,
            'payment_status'     => 1,
            'start_date'         => date("Y-m-d H:i:s",strtotime($request->start_date)),
            'due_date'           => date("Y-m-d H:i:s",strtotime($request->due_date)),
            'client_id'          => $request->client_id,
         ]);
        return redirect('projects')->with('message', 'Project Added successfully!');
    }
    public function edit($id)
    {
        $title      = 'Edit Project';
        $action_url ='projects/update/'.$id;
        $skills     = DB::table('skills')->get();
        $client     = DB::table('clients as cl')->select('us.name','cl.id')->leftJoin('users as us', 'cl.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $employee   = DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency   = Countries::all();
        $projects   = Project::find($id);
        return view('projects.add_projects', [
            'title'     => $title,
            'action_url'=> $action_url,
            'client'    => $client,
            'employee'  => $employee,
            'skills'    => $skills,
            'currency'  => $currency,
            'projects'  => $projects,
        ]);
    }
    public function update(Request $request,$id)
    {
        $project_manager           = $request->project_manager;
        $developer                 = !empty($request->developers) ? implode(',',$request->developers): " ";
        $pos = strpos($developer,$project_manager);
        if(!empty($pos)){
            $developer      = $developer;
        }else{
            $developer      = $developer.",$project_manager";
        }
        $projects                  = Project::find($id);
        $projects->name            = $request->name;
        $projects->budget          = $request->budget;
        $projects->project_manager = $project_manager;
        $projects->description     = $request->description;
        $projects->required_skills = !empty($request->required_skills) ? implode(',',$request->required_skills): " ";
        $projects->developers      = $developer;
        $projects->project_status  = $request->project_status;
        $projects->start_date      = date("Y-m-d H:i:s",strtotime($request->start_date));
        $projects->due_date        = date("Y-m-d H:i:s",strtotime($request->due_date));
        $projects->client_id       = $request->client_id;
        $projects->save();

        return redirect('projects')->with('message', 'Project Updated successfully!');
    }
    public function check_Projects_name(Request $request){
        $name    = $request->input('name');
        $p_id    = $request->input('p_id');
        if($p_id){
            $isExists = Project::where([['name',$name],['id','!=',$p_id]])->first();
        }else{
            $isExists = Project::where('name',$name)->first();
        }
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
    public function change_status(Request $request){
        $id              = $request->input('id');
        $status          = $request->input('status');
        $is_updated      = Project::find($id)->update(array('project_status' => $status));
        if($is_updated){
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }
    public function change_payment_status(Request $request){
        $id             = $request->input('id');
        $status         = $request->input('status');
        $is_updated     = Project::find($id)->update(array('payment_status' => $status));
        if($is_updated){
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }
    public function destroy($id)
    {
        $Project  = Project::findOrFail($id);
        $data     = $Project->delete();
        return response()->json($data);
    }
    public function dashboard($id){ // project Dashboard
        $projects     =  Project::find($id);
        $client       =  Project::find($id)->get_client_data; // get Client that belong to projects
        $all_tasks    =  DB::table('tasks as ts')->select('ts.id','ts.assigned_by','ts.assigned_to','us.name as ass_by','ts.name as task_name','man.name as ass_to','ts.description','ts.status','ts.due_date','ts.updated_at')
                     ->leftjoin('users as us','ts.assigned_by','=','us.id' )
                     ->leftjoin('users as man','ts.assigned_to','=','man.id' )
                     ->where('ts.project_id','=',$id)->get();
        $completed_tasks    =  DB::table('tasks as ts')->select('ts.id','us.name as ass_by','ts.name as task_name','man.name as ass_to','ts.description','ts.status','ts.due_date','ts.updated_at')
                     ->leftjoin('users as us','ts.assigned_by','=','us.id' )
                     ->leftjoin('users as man','ts.assigned_to','=','man.id' )
                     ->where('ts.project_id','=',$id)
                     ->where('ts.status','=','3')->limit(6)->orderBy('ts.updated_at', 'DESC')->get();
        $user_id            =  $client->user_id;
        $users              =  DB::table('users')->where('id',$user_id)->first();
        $projects_man       =  $projects->project_manager;
        $projects_man       =  DB::table('users')->where('id',$projects_man)->first();
        $project_develop    =  explode(",",$projects->developers);
        $project_developers =  User::find($project_develop);
        $employee           =  DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency           =  Countries::all();
        $milestones         = Project::find($id)->get_mile_stone;
        $m_tasks = array();
        foreach($milestones as $milestone_id){
           $m_id = explode(",",$milestone_id->tasks);
           $m_tasks[$milestone_id->id] = Task::find($m_id);
        }
        $task_developer = array();
        foreach($all_tasks as $task){
            $task_developer[$task->assigned_to][] = $task;
        }
        return view('projects.dashboard', [
             'users'           => $users,
             'employee'        => $employee,
             'currency'        => $currency,
             'projects'        => $projects,
             'milestones'      => $milestones,
             'projects_man'    => $projects_man,
             'project_dev'     => $project_developers,
             'tasks'           => $all_tasks,
             'task_developer'  => $task_developer,
             'com_tasks'      => $completed_tasks,
             'm_tasks'        => $m_tasks,
        ]);
    }
}

