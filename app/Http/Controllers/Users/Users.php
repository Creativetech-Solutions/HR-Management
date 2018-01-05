<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\User;  // call user model
use App\model\Clients;
use Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Users extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('users.view');
    }
    public function getData() // get data form user table
    {
        $users = DB::table('users')
           ->select('id','name as name','email as email','user_type as user_type','country as country','status as status');
        $data = Datatables::of($users)
            ->escapeColumns()
            ->addColumn('action', function ($users) {
                return '<a href="' . route("users.edit", $users->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$users->id.'" data-title="'.$users->name.'" data-content="'.$users->email.'">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($users){
                if($users->status == 1){
                    return '<span class="publish-modal btn btn-xs btn-success" data-id="'.$users->id.'" data-title="'.$users->name.'" data-content="'.$users->email.'" data-status="'.$users->status.'">Published</span>';
                }else {
                    return '<span class="publish-modal btn btn-xs btn-danger"  data-id="'.$users->id.'" data-title="'.$users->name.'" data-content="'.$users->email.'" data-status="'.$users->status.'">Pending</span>';
                }})
            ->rawColumns(array("action", "status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'Add User';
        $action_url ='users/store';
        $countries  = Countries::all();
        $skills     = DB::table('skills')->get();
        $user       = " ";
        return view('users.add_user', ['title'=>$title,'action_url'=>$action_url,'user'=>$user,'skills' => $skills,'countries'=>$countries]);
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
            'user_type'    => $request->user_type ? implode(',',$request->user_type):" ",
            'status'       => '0',
            'active'       => '0',
            'gender'       => $request->gender,
            'password'     => bcrypt($request->password)
        ]);
        $last_id = $Last_array->id;
        $Last_array2    =  Clients::create([
            'user_id'            => $last_id,
        ]);
        return redirect('users')->with('message', 'User Added successfully!');
    }
    public function edit($id)
    {
        $title      = 'Edit User';
        $action_url = 'users/update/'.$id;
        $countries  = Countries::all();
        $skills     = DB::table('skills')->get();
        $user       = User::find($id);
        $cl_data    = User::find($id)->clients()->first();  // call function in user class clients
        $cl_data    = $cl_data ?  $cl_data : " " ;
        return view('users.Add_user', [
            'cl_data'   =>  $cl_data,
            'user'      =>  $user,
            'title'     =>  $title,
            'action_url'=>  $action_url,
            'skills'    =>  $skills,
            'countries' =>  $countries
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
        $User->user_type     = $request->user_type ? implode(',',$request->user_type):" ";
        $User->password      = bcrypt($request->password);
        $User->save();
        return redirect('users')->with('message', 'user updated successfully!');
    }
    public function check_email(Request $request){
        $email    = $request->input('email');
        $isExists = User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
    public function change_status(Request $request){
        $id         = $request->input('id');
        $status     = $request->input('status');
        $status     = $status == 1 ? 0 : 1;
        $is_updated   = User::find($id)->update(array('status' => $status));
        if($is_updated){
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }
    public function destroy($id)
    {
        $User  = User::findOrFail($id);
        $data  = $User->delete();
        return response()->json($data);
    }
    public function update_user_image( Request $request){

         $id   = $request->input('ids');

        if($request->hasFile('names')) {
            $file = $request->file('names');
            $name = 'logo'.'.'.$file->getClientOriginalExtension();
            $image['filePath'] = $name;
            $file->move('assets/images/logo', $name);
        }else{
            $name ="sdf ";
        }
        $name = $request->input('names');
        $data   = User::find($id)->update(array('logo'=>$name));
        if($data){
            return response()->json(array("exists" =>true));
        }
        else{
            return response()->json(array("exists"=>false));
        }

    }
}

