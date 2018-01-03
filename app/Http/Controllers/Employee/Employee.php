<?php
namespace App\Http\Controllers\Employee;
use App\model\Employees;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;  // call user model
use Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Employee extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('employee.view');
    }
    public function getData() // get data form user table
    {
        $employee = DB::table('employee as em')
            ->leftJoin('users as us', 'em.user_id', '=', 'us.id')
            ->select('us.id','us.name as name','us.email as email','us.country as country','us.status as status','em.last_increment as last_increment','em.total_leaves as total_leaves');
        $data = Datatables::of($employee)
            ->escapeColumns()
            ->addColumn('action', function ($employee) {
                return '<a href="' . route("employee.profile", $employee->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                 <a href="' . route("employee.edit", $employee->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$employee->id.'" data-title="'.$employee->name.'" data-content="'.$employee->email.'">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($employee){
                if($employee->status == 1){
                    return '<span class="publish-modal btn btn-xs btn-success" data-id="'.$employee->id.'" data-title="'.$employee->name.'" data-content="'.$employee->email.'" data-status="'.$employee->status.'">Published</span>';
                }else {
                    return '<span class="publish-modal btn btn-xs btn-danger"  data-id="'.$employee->id.'" data-title="'.$employee->name.'" data-content="'.$employee->email.'" data-status="'.$employee->status.'">Pending</span>';
                }})
            ->rawColumns(array("action", "status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title       = 'Add Employee';
        $action_url  = 'employee/store';
        $countries   = Countries::all();
        $skills      = DB::table('skills')->where('status','=',1)->get();
        $user        = " ";
        $dev_data    = " ";
        return view('employee.add_employee', [
            'title'     => $title,
            'action_url'=> $action_url,
            'user'      => $user,
            'cl_data'   => $dev_data,
            'skills'    => $skills,
            'countries' => $countries]);
    }
    public function store(Request $request)
    {
        $Last_array = User::create([
            'email'        => $request->email,
            'name'         => $request->name,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'city'         => $request->city,
            'country'      => $request->country,
            'zipcode'      => $request->zipcode,
            'status'       => '0',
            'active'       => '0',
            'user_type'    => 'Developer',
            'gender'       => $request->gender,
            'password'     => bcrypt($request->password)
        ]);
        $last_id = $Last_array->id;
        $Last_array2    =  Employees::create([
            'user_id'            => $last_id,
            'salary'             => $request->salary,
            'total_leaves'       => $request->total_leaves,
            'join_date'          => date("Y-m-d H:i:s",strtotime($request->join_date)),
            'last_increment'     => date("Y-m-d H:i:s",strtotime($request->last_increment)),
            'required_skills'    => $request->required_skills ? implode(',',$request->required_skills):" ",
        ]);
        return redirect('employee')->with('message', 'Employee Added successfully!');
    }
    public function edit($id)
    {
        $title      = 'Edit Employee';
        $action_url = 'employee/update/'.$id;
        $countries  = Countries::all();
        $skills     = DB::table('skills')->get();
        $user       = User::find($id);
        $dev_data   = User::find($id)->developer()->first();  // call function in user class clients
        $dev_data   = $dev_data ?  $dev_data : " " ;
        return view('employee.add_employee', [
            'dev_data'   =>  $dev_data,
            'user'       =>  $user,
            'title'      =>  $title,
            'action_url' =>  $action_url,
            'skills'     =>  $skills,
            'countries'  =>  $countries
        ]);
    }
    public function update(Request $request,$id)
    {
        $User                = User::find($id);
        $User->name          = $request->name;
        $User->first_name    = $request->first_name;
        $User->last_name     = $request->last_name;
        $User->city          = $request->city;
        $User->country       = $request->country;
        $User->zipcode       = $request->zipcode;
        $User->gender        = $request->gender;
        $User->password      = bcrypt($request->password);
        $User->save();
        $developer           = User::find($id)->developer()->first();
        $developer->salary          = $request->salary;
        $developer->total_leaves    = $request->total_leaves;
        $developer->join_date       = date("Y-m-d H:i:s",strtotime($request->join_date));
        $developer->last_increment  = date("Y-m-d H:i:s",strtotime($request->last_increment));
        $developer->required_skills = $request->required_skills ? implode(',',$request->required_skills):" ";
        $developer->save();
        return redirect('employee')->with('message', 'Employee updated successfully!');
    }
    public function profile($id){
        $title      = 'User Profile';
        $action_url = 'employee/update/'.$id;
        $countries  = Countries::all();
        $skills     = DB::table('skills')->get();
        $user       = User::find($id);
        $dev_data   = User::find($id)->developer()->first();  // call function in user class clients
        $dev_data   = $dev_data ?  $dev_data : " " ;
        return view('employee.profile', [
            'dev_data'   =>  $dev_data,
            'user'       =>  $user,
            'title'      =>  $title,
            'action_url' =>  $action_url,
            'skills'     =>  $skills,
            'countries'  =>  $countries
        ]);
    }
}
