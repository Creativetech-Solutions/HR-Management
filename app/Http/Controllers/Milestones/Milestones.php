<?php

namespace App\Http\Controllers\Milestones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;
use App\model\Milestone;
use Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Milestones extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('milestone.view');
    }

    public function getData() // get data form user table
    {
        $milestones = DB::table('milestones as ms')
            ->leftjoin('projects as pro','ms.project_id','=','pro.id')
            ->leftjoin('users as em','ms.emp_id','=','em.id')
            ->select('ms.id','ms.title','pro.name as pro_name','ms.mile_status as mile_status','ms.start_date','ms.due_date','em.name as emp_name','ms.budget','ms.payment_status as payment_status');
        $data = Datatables::of($milestones)
            ->escapeColumns()
            ->addColumn('action', function ($milestones) {
                return '<a href="' . route("milestones.edit", $milestones->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$milestones->id.'" data-title="'.$milestones->title.'" data-content="">
                  <span class="glyphicon glyphicon-trash"></span></button>';})
            ->addColumn('mile_status',function($milestones){
                if($milestones->mile_status == 1){
                    return '<span class="mile_status btn btn-xs btn-light-azure" data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->mile_status.'">Active</span>';
                }else if($milestones->mile_status == 2) {
                    return '<span class="mile_status btn btn-xs btn-dark-blue"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->mile_status.'">OnHold</span>';
                }else if($milestones->mile_status == 3) {
                    return '<span class="mile_status btn btn-xs btn-success"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->mile_status.'">Completed</span>';
                }else if($milestones->mile_status == 4) {
                    return '<span class="mile_status btn btn-xs  btn-dark-red"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'"  data-status="'.$milestones->mile_status.'">Drop</span>';
                }
            })->addColumn('payment_status',function($milestones){
                if($milestones->payment_status == 1){
                    return '<span class="milestones_pay_status btn btn-xs btn-dark-red" data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->payment_status.'">Pending</span>';
                }else if($milestones->payment_status == 2) {
                    return '<span class="milestones_pay_status btn btn-xs btn-dark-blue"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->payment_status.'">InComplete</span>';
                }else if($milestones->payment_status == 3) {
                    return '<span class="milestones_pay_status btn btn-xs btn-success"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'"data-status="'.$milestones->payment_status.'">Paid</span>';
                }else if($milestones->payment_status == 4) {
                    return '<span class="milestones_pay_status btn btn-xs btn-orange"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->payment_status.'">Cancelled</span>';
                }
            })
            ->rawColumns(array("action","mile_status","payment_status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }

    public function add()
    {
        $title      = 'Add Milestone';
        $action_url ='milestones/store';
        $project     = DB::table('projects as pro')->select('pro.name as project_name','pro.id')->get();
        $employee   = DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency   =  Countries::all();
        $milestones   = " ";
        return view('milestone.add_milestone', [
            'title'     =>$title,
            'action_url'=>$action_url,
            'employee'  =>$employee,
            'currency'  => $currency,
            'project'  => $project,
            'milestones'  => $milestones,
        ]);
    }

    public function store(Request $request)
    {
        $Last_array = Milestone::create([
            'title'              => $request->title,
            'description'              => $request->description,
            'budget'             => $request->budget,
            'currency'           => $request->currency,
            'emp_id'             => $request->emp_id,
            'mile_status'        => $request->mile_status,
            'payment_status'     => $request->payment_status,
            'start_date'         => date("Y-m-d H:i:s",strtotime($request->start_date)),
            'due_date'           => date("Y-m-d H:i:s",strtotime($request->due_date)),
            'project_id'          => $request->project_id,
        ]);
        return redirect('milestones')->with('message', 'Milestone Added successfully!');
    }

    public function edit($id)
    {
        $title      = 'Edit Milestone';
        $action_url ='milestones/update/'.$id;
        $project     = DB::table('projects as pro')->select('pro.name as project_name','pro.id')->get();
        $employee   = DB::table('employee as em')->select('us.name','us.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $currency   =  Countries::all();
        $milestones   = Milestone::find($id);
        return view('milestone.add_milestone', [
            'title'     => $title,
            'action_url'=> $action_url,
            'employee'  => $employee,
            'currency'  => $currency,
            'project'  => $project,
            'milestones'=> $milestones,
        ]);
    }

    public function update(Request $request,$id)
    {
        $milestones                  = Milestone::find($id);
        $milestones->title            = $request->title;
        $milestones->description            = $request->description;
        $milestones->budget          = $request->budget;
        $milestones->currency        = $request->currency;
        $milestones->emp_id         = $request->emp_id;
        $milestones->mile_status  = $request->mile_status;
        $milestones->payment_status  = $request->payment_status;
        $milestones->start_date      = date("Y-m-d H:i:s",strtotime($request->start_date));
        $milestones->due_date        = date("Y-m-d H:i:s",strtotime($request->due_date));
        $milestones->project_id       = $request->project_id;
        $milestones->save();

        return redirect('milestones')->with('message', 'Milestone Updated successfully!');
    }

    public function change_status(Request $request){
        $id              = $request->input('id');
        $status          = $request->input('status');
        $is_updated      = Milestone::find($id)->update(array('mile_status' => $status));
        if($is_updated){
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }

    public function milestones_pay_status(Request $request){
        $id             = $request->input('id');
        $status         = $request->input('status');
        $is_updated     = Milestone::find($id)->update(array('payment_status' => $status));
        if($is_updated){
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }

    public function destroy($id)
    {
        $Milestone  = Milestone::findOrFail($id);
        $data     = $Milestone->delete();
        return response()->json($data);
    }
}
