<?php

namespace App\Http\Controllers\Milestones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;  // call user model
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
        $milestones = DB::table('users as us')
            ->leftjoin('clients as cl','cl.user_id','=','us.id')
            ->rightjoin('projects as pro','pro.client_id','=','cl.id')
            ->leftjoin('users as em','em.id','=','pro.project_manager')
            ->select('pro.id','pro.name as pro_name','us.name as client_name','pro.project_status','pro.start_date','pro.due_date','em.name as emp_name','pro.payment_status as payment_status');
        $data = Datatables::of($milestones)
            ->escapeColumns()
            ->addColumn('action', function ($milestones) {
                return '<a href="' . route("projects.edit", $milestones->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-content="">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($milestones){
                if($milestones-status == 1){
                    return '<span class="status btn btn-xs btn-light-azure" data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->project_status.'">Active</span>';
                }else if($milestones->status == 2) {
                    return '<span class="status btn btn-xs btn-dark-blue"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->project_status.'">OnHold</span>';
                }else if($milestones->status == 3) {
                    return '<span class="status btn btn-xs btn-success"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->project_status.'">Completed</span>';
                }else if($milestones->status == 4) {
                    return '<span class="status btn btn-xs  btn-dark-red"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'"  data-status="'.$milestones->project_status.'">Drop</span>';
                }
            })->addColumn('payment_status',function($milestones){
                if($milestones->payment_status == 1){
                    return '<span class="project_pay_status btn btn-xs btn-dark-red" data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->payment_status.'">Pending</span>';
                }else if($milestones->payment_status == 2) {
                    return '<span class="project_pay_status btn btn-xs btn-dark-blue"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->payment_status.'">InComplete</span>';
                }else if($milestones->payment_status == 3) {
                    return '<span class="project_pay_status btn btn-xs btn-success"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'"data-status="'.$milestones->payment_status.'">Paid</span>';
                }else if($milestones->payment_status == 4) {
                    return '<span class="project_pay_status btn btn-xs btn-orange"  data-id="'.$milestones->id.'" data-title="'.$milestones->pro_name.'" data-status="'.$milestones->payment_status.'">Cancelled</span>';
                }
            })
            ->rawColumns(array("action","status","payment_status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
}
