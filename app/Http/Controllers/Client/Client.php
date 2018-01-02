<?php
namespace App\Http\Controllers\Client;
use App\model\Clients;
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


class Client extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Need to work on the client dashboard 123456
    public function index()
    {
        return view('client.view');
    }
    public function getData() // get data form user table
    {
        $clients = DB::table('clients as cl')
            ->leftJoin('users as us', 'cl.user_id', '=', 'us.id')
            ->select('us.id','us.name as name','us.email as email','cl.required_skills as required_skills','cl.platform as platform','us.country as country','us.status as status');
            $data = Datatables::of($clients)
            ->escapeColumns()
            ->addColumn('action', function ($clients) {
                 return '<a href="' . route("clients.edit", $clients->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$clients->id.'" data-title="'.$clients->name.'" data-content="'.$clients->email.'">
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($clients){
                if($clients->status == 1){
                     return '<span class="publish-modal btn btn-xs btn-success" data-id="'.$clients->id.'" data-title="'.$clients->name.'" data-content="'.$clients->email.'" data-status="'.$clients->status.'">Published</span>';
                }else {
                    return '<span class="publish-modal btn btn-xs btn-danger"  data-id="'.$clients->id.'" data-title="'.$clients->name.'" data-content="'.$clients->email.'" data-status="'.$clients->status.'">Pending</span>';
                }})
            ->rawColumns(array("action", "status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'Add Client';
        $action_url ='clients/store';
        $countries  = Countries::all();
        $skills     = DB::table('skills')->where('status','=',1)->get();
        $user       = " ";
        $cl_data    = " ";
        return view('client.add_client', ['title'=>$title,'action_url'=>$action_url,'user'=>$user,'cl_data'=>$cl_data,'skills' => $skills,'countries'=>$countries]);
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
            'user_type'    => 'Client',
            'gender'       => $request->gender,
            'password'     => bcrypt($request->password)
        ]);
        $last_id = $Last_array->id;
        $Last_array2    =  Clients::create([
            'user_id'            => $last_id,
            'platform'           => $request->platform,
            'status'             => '0',
            'required_skills'    => $request->required_skills ? implode(',',$request->required_skills):" ",
        ]);
        return redirect('clients')->with('message', 'Client Added successfully!');
    }
    public function edit($id)
    {
        $title      = 'Edit Client';
        $action_url = 'clients/update/'.$id;
        $countries  = Countries::all();
        $skills     = DB::table('skills')->get();
        $user       = User::find($id);
        $cl_data    = User::find($id)->clients()->first();  // call function in user class clients
        $cl_data    = $cl_data ?  $cl_data : " " ;
        return view('client.add_client', [
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
        $User->password      = bcrypt($request->password);
        $User->save();

        $clients                 = User::find($id)->clients()->first();
        $clients->platform       = $request->platform;
        $clients->required_skills= $request->required_skills ? implode(',',$request->required_skills):" ";
        $clients->save();
        return redirect('clients')->with('message', 'Client updated successfully!');
    }
}
