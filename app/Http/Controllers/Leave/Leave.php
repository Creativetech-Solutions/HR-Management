<?php
namespace App\Http\Controllers\Leave;
use App\model\Leaves;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;  // call user model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table


class Leave extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('leave.view');
    }
    public function getData() // get data form user table
    {
        $leave = DB::table('leave as le')
            ->leftJoin('employee as em', 'le.emp_id', '=', 'em.id')
            ->leftJoin('users as us', 'em.user_id', '=', 'us.id')
            ->leftJoin('users as user', 'le.approved_by', '=', 'user.id')
            ->select('le.id','us.name as name','user.name as admin_name','us.email as email','le.total_leave as total_leave','le.approved_by as approved_by','le.status as status');
        $data = Datatables::of($leave)
            ->escapeColumns()
            ->addColumn('action', function ($leave) {
                return '<a href="' . route("leave.edit", $leave->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($leave){
                if($leave->status == 1){
                    return '<span class="btn btn-xs btn-success" data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'" data-status="'.$leave->status.'">Approved</span>';
                }
                else if($leave->status == 2){
                    return '<span class="btn btn-xs btn-dark-red" data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'" data-status="'.$leave->status.'">Rejected</span>';
                }else {
                    return '<span class="btn btn-xs btn-danger"  data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'" data-status="'.$leave->status.'">Pending</span>';
                }})
            ->addColumn('approved_by',function($leave){
                if($leave->approved_by == 0){
                    return '<span class="approve-modal btn btn-xs btn-danger" data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'" data-status="'.$leave->approved_by.'">Pending</span>';
                }else if($leave->approved_by == -1) {
                    return '<span class="approve-modal btn btn-xs btn-dark-red"  data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'" data-status="'.$leave->approved_by.'">Rejected</span>';
                }else{
                    return '<span class="approve-modal btn btn-xs btn-success"  data-id="'.$leave->id.'" data-title="'.$leave->name.'" data-content="'.$leave->email.'" data-status="'.$leave->approved_by.'">'.$leave->admin_name.'</span>';
                }})
            ->rawColumns(array("action", "status","approved_by"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'Apply for leave';
        $action_url ='leave/store';
        $employee   = DB::table('employee as em')->select('us.name','em.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $leave      = " ";
        return view('leave.add_leave', [
            'title'     => $title,
            'action_url'=> $action_url,
            'employee'  => $employee,
            'leave'     => $leave,
        ]);
    }
    public function store(Request $request)
    {
        $Last_array = Leaves::create([
            'emp_id'        => $request->emp_id,
            'total_leave'   => $request->total_leave,
            'description'   => $request->description,
            'leave_from'    =>  date("Y-m-d H:i:s",strtotime($request->leave_from)),
            'leave_to'      =>  date("Y-m-d H:i:s",strtotime($request->leave_to)),
             'status'       => '0',
        ]);
        return redirect('leave')->with('message', 'Successfully Applied for Leave!');
    }
    public function edit($id)
    {
        $title      = 'Edit leave';
        $action_url = 'leave/update/'.$id;
        $employee   = DB::table('employee as em')->select('us.name','em.id')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $leave      = Leaves::find($id);
        $leave      = $leave ?  $leave : " " ;
        return view('leave.Add_leave', [
            'title'     => $title,
            'action_url'=> $action_url,
            'employee'  => $employee,
            'leave'     => $leave,
        ]);
    }
    public function update(Request $request,$id)
    {
        $leaves                = Leaves::find($id);
        $leaves->emp_id        = $request->emp_id;
        $leaves->total_leave   = $request->total_leave;
        $leaves->description   = $request->description;
        $leaves->leave_from    = date("Y-m-d H:i:s",strtotime($request->leave_from));
        $leaves->leave_to      = date("Y-m-d H:i:s",strtotime($request->leave_to));
        $leaves->save();
        return redirect('leave')->with('message', 'leave Application updated successfully!');
    }
    public function approve_leave(Request $request){

        $Leave_id = $request->id;
        $user_id  = $request->user_id;
        ($user_id == -1) ? $status = 2 : $status = 1;
        $data     = Leaves::find($Leave_id)->update(array('approved_by'=>$user_id,'status'=> $status));
        if($data == true){
            return response()->json($data);
        }else{
            return response()->json($data);
        }
    }
    public function destroy($id)
    {
        $Project  = Leaves::findOrFail($id);
        $data     = $Project->delete();
        return response()->json($data);
    }
}
