<?php
namespace App\Http\Controllers\Salary;
    use App\model\Leaves;
    use App\model\Salary_transaction;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use DataTables;
    use App\User;  // call user model
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Http\JsonResponse ; // for data table


class Salary extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('salary.view');
    }
    public function getData() // get data form user table
    {
        $salary = DB::table('salary_transaction as sa')
            ->leftJoin('employee as em', 'sa.emp_id', '=', 'em.id')
            ->leftJoin('users as us', 'em.user_id', '=', 'us.id')
            ->select('sa.id','us.name as name', 'sa.salary_month as salary_month','sa.trans_date as trans_date','us.email as email','sa.amount as amount','sa.status as status');
        $data = Datatables::of($salary)
            ->escapeColumns()
            ->addColumn('action', function ($salary) {
                return '<a href="' . route("salary.edit", $salary->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$salary->id.'" data-title="'.$salary->name.'" data-content="'.$salary->email.'">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($salary){
                if($salary->status == 1){
                    return '<span class="publish-modal btn btn-xs btn-success" data-id="'.$salary->id.'" data-title="'.$salary->name.'" data-content="'.$salary->email.'" data-status="'.$salary->status.'">Sent</span>';
                }else {
                    return '<span class="publish-modal btn btn-xs btn-danger"  data-id="'.$salary->id.'" data-title="'.$salary->name.'" data-content="'.$salary->email.'" data-status="'.$salary->status.'">Pending</span>';
                }})
            ->rawColumns(array("action", "status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'New Transaction';
        $action_url ='salary/store';
        $employee   = DB::table('employee as em')->select('us.name','em.id','em.salary')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $leave      = " ";
        return view('salary.add_salary', [
            'title'     => $title,
            'action_url'=> $action_url,
            'employee'  => $employee,
            'leave'     => $leave,
        ]);
    }
    public function store(Request $request)
    {
        $amount = $request->salary;
        !empty($request->bonus)    ? $amount = $amount + $request->bonus     : $amount;
        !empty($request->deduction)? $amount = $amount - $request->deduction : $amount;

        $Last_array = Salary_transaction::create([

            'emp_id'        => $request->emp_id,
            'amount'        => $amount,
            'bonus'         => $request->bonus,
            'deduction'     => $request->deduction,
            'trans_date'    =>  date("Y-m-d H:i:s",strtotime($request->trans_date)),
            'salary_month'  =>  date("Y-m-d H:i:s",strtotime($request->salary_month)),
            'status'        => '1',
        ]);
        return redirect('salary/transactions')->with('message', 'Successfully Added  New Transactions!');
    }
    public function edit($id)
    {
        $title      = 'salary Transactions Edit';
        $action_url = 'salary/update/'.$id;
        $employee   = DB::table('employee as em')->select('us.name','em.id','em.salary')->Join('users as us', 'em.user_id', '=', 'us.id')->where('us.status','=','1')->get();
        $salary     = Salary_transaction::find($id);
        return view('salary.add_salary', [
            'title'     => $title,
            'action_url'=> $action_url,
            'employee'  => $employee,
            'salary'     => $salary,
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
    public function salary_tran_status(Request $request){

        echo "here";
        $salary_id = $request->id;
        $status    = $request->status;

        $data      = Salary_transaction::find($salary_id)->update(array('status'=> $status));
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
