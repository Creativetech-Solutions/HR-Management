<?php
namespace App\Http\Controllers\Salary;
    use App\model\Employees;
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
    public function increment_due(){
         return view('salary.inc_due');
    }
    public function increment_due_data() // get data form user table
    {
        $date = date("Y-m-d H:i:s");
        $effectiveDate = date('Y-m-d H:i:s', strtotime("-6 months", strtotime($date)));
        
        $employee = DB::table('employee as em')
            ->leftJoin('users as us', 'em.user_id', '=', 'us.id')
            ->where('us.status','=',1)
           ->whereDate('em.last_increment', '<', $effectiveDate)
           ->select('em.id','us.name as name','us.email as email','em.salary as salary','em.last_increment as last_increment','us.status as status');
         $data = Datatables::of($employee)
            ->escapeColumns()
            ->addColumn('status',function($employee){
                  return '<span class="btn btn-xs btn-warning" data-id="'.$employee->id.'" data-title="'.$employee->name.'" data-content="'.$employee->email.'" data-status="'.$employee->status.'">Increment Due</span>';
                 })
             ->addColumn('Action',function($employee){
                 return '<span class="increase_salary btn btn-xs btn-success" data-id="'.$employee->id.'" data-title="'.$employee->name.'" data-content="'.$employee->email.'" data-status="'.$employee->salary.'">Increase Salary</span>';
             })
            ->rawColumns(array("status","Action"))//rawColumns used for multiple column
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
            'title'      => $title,
            'action_url' => $action_url,
            'employee'   => $employee,
            'salary'     => $salary,
        ]);
    }
    public function update(Request $request,$id)
    {
        $amount = $request->salary;
        !empty($request->bonus)    ? $amount = $amount + $request->bonus     : $amount;
        !empty($request->deduction)? $amount = $amount - $request->deduction : $amount;
        $salary                = Salary_transaction::find($id);
        $salary->emp_id        = $request->emp_id;
        $salary->amount        = $amount;
        $salary->bonus         = $request->bonus;
        $salary->deduction     = $request->deduction;
        $salary->trans_date    =  date("Y-m-d H:i:s",strtotime($request->trans_date));
        $salary->salary_month  =  date("Y-m-d H:i:s",strtotime($request->salary_month));
         $salary->save();
        return redirect('salary/transactions')->with('message', 'salary Transactions updated successfully!');
    }
    public function change_status(Request $request){
        $salary_id = $request->id;
        $status    = $request->status;
        $status    = $status == 1 ? 0 : 1 ;
        $data      = Salary_transaction::find($salary_id)->update(array('status'=> $status));
        if($data == true){
            return response()->json($data);
        }else{
            return response()->json($data);
        }
    }
    public function destroy($id)
    {
        $Project  = Salary_transaction::findOrFail($id);
        $data     = $Project->delete();
        return response()->json($data);
    }
    public function increase_salary(Request $request){
        $em_di      = $request->id;
        $employee   = Employees::find($em_di);
        $employee->salary += $request->salary;
        $employee->last_increment = date('Y-m-d H:i:s');
        $data = $employee->save();
        if($data == true){
            return response()->json($data);
        }else{
            return response()->json($data);
        }
    }
}
