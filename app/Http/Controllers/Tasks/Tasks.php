<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;  // call user model
use App\model\Project;
use App\model\Task;
use App\model\Task_activity;
use Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table
use Illuminate\Support\Facades\Auth;

class Tasks extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('tasks.view');
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
                }else if($projects->payment_status == 5) {
                    return '<span class="project_pay_status btn btn-xs btn-danger"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Refunded</span>';
                }else if($projects->payment_status == 6) {
                    return '<span class="project_pay_status btn btn-xs btn-danger"  data-id="'.$projects->id.'" data-title="'.$projects->pro_name.'" data-status="'.$projects->payment_status.'">Declined</span>';
                }
            })
            ->rawColumns(array("action","project_status","payment_status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'Add Task';
        $action_url ='tasks/store';
        $skills     = DB::table('skills')->get();
        $client     = DB::table('clients as cl')->select('us.name','cl.id')->leftJoin('users as us', 'cl.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $employee   = DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency   =  Countries::all();
        $projects   = " ";
        return view('tasks.add_tasks', [
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
        $Last_array = Task::create([
            'name'            => $request->task_name,
            'project_id'      => $request->p_id,
            'due_date'        => $request->due_date,
            'assigned_to'     => $request->developer,
            'description'     => $request->description,
            'assigned_by'     => $request->ass_by_id,
            'status'          => '0',
        ]);
        $user_name  = !empty( Auth::user()->name) ? Auth::user()->name  : Auth::user()->email;
        $activity   = 'Added this Task to To Do';
        Task_activity::create([
            'task_id'         => $Last_array->id,
            'activity'        => $activity,
            'user_name'       => $user_name,
            'user_id'         => $request->ass_by_id,  //updated user id
        ]);
        $last_id = $Last_array->id;
        return $last_id;
    }
    public function edit($id) // not in use
    {
        $title      = 'Edit Task';
        $action_url ='projects/update/'.$id;
        $skills     = DB::table('skills')->get();
        $client     = DB::table('clients as cl')->select('us.name','cl.id')->leftJoin('users as us', 'cl.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $employee   = DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency   =  Countries::all();
        $projects   = Project::find($id);
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
    public function update(Request $request,$id)
    {
        $task               = Task::find($id);
        $task->name         = $request->task_name;
        $task->project_id   = $request->p_id;
        $task->due_date     = $request->due_date;
        $task->assigned_to  = $request->developer;
        $task->description  = $request->description;
        $task->assigned_by  = $request->ass_by_id;
        $task->status       = $request->status;
        $task->save();

        $user_name  = !empty( Auth::user()->name) ? Auth::user()->name  : Auth::user()->email;
        $activity   = 'Updated this Task';
        Task_activity::create([
            'task_id'         => $id,
            'activity'        => $activity,
            'user_name'       => $user_name,
            'user_id'         => $request->ass_by_id,  //updated user id
        ]);
        return $id;
    }

    public function change_task_status(Request $request){
        $id         = $request->input('id');
        $status     = $request->input('status');
        $old_status = Task::find($id);
        $old_status = $old_status->status;
        switch ($old_status){
            case 0:
                $old_status = "To Do" ;
                break;
            case 1:
                $old_status = "Doing" ;
                break;
            case 2:
                $old_status = "Review" ;
                break;
            case 3:
                $old_status = "Done" ;
                break;
         }
         switch ($status){
            case 0:
                $new_status = "To Do" ;
                break;
            case 1:
                $new_status = "Doing" ;
                break;
            case 2:
                $new_status = "Review" ;
                break;
            case 3:
                $new_status = "Done" ;
                break;
         }
        $is_updated      = Task::find($id)->update(array('status' => $status));
        if($is_updated){
            $user_name  = !empty( Auth::user()->name) ? Auth::user()->name  : Auth::user()->email;
            $activity   = 'Moved this card from  '.$old_status.' to '. $new_status;
            Task_activity::create([
                'task_id'         => $id,
                'activity'        => $activity,
                'user_name'       => $user_name,
                'user_id'         => Auth::user()->id,  //updated user id
            ]);
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }

    public function destroy($id)
    {
        $task  = Task::findOrFail($id);
        $data     = $task->delete();
        return response()->json($data);
    }
    public function get_activities($id){
        return Task::find($id)->getactivity()->get();
    }
}


