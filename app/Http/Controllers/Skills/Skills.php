<?php

namespace App\Http\Controllers\Skills;
use App\model\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Skills extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('skills.view');
    }
    public function getData() // get data form user table
    {
        $skills = DB::table('skills')
            ->select('id','skill_name as skill_name','status as status');
        $data = Datatables::of($skills)
            ->escapeColumns()
            ->addColumn('action', function ($skills) {
                return '<a href="' . route("skills.edit", $skills->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <button class="delete-modal btn btn-xs btn-danger" data-id="'.$skills->id.'" data-title="'.$skills->skill_name.'" data-content=" " >
                  <span class="glyphicon glyphicon-trash"></span> Delete</button>';})
            ->addColumn('status',function($skills){
                if($skills->status == 1){
                    return '<span class="publish-modal btn btn-xs btn-success" data-id="'.$skills->id.'" data-title="'.$skills->skill_name.'" data-content=" " data-status="'.$skills->status.'">Published</span>';
                }else {
                    return '<span class="publish-modal btn btn-xs btn-danger"  data-id="'.$skills->id.'" data-title="'.$skills->skill_name.'" data-content=" " data-status="'.$skills->status.'">Pending</span>';
                }})
            ->rawColumns(array("action", "status"))//rawColumns used for multiple column
            ->make(true);
        return $data;
    }
    public function add()
    {
        $title      = 'Add Skill';
        $action_url ='skills/store';
        return view('skills.add_skills', ['title'=>$title,'action_url'=>$action_url]);
    }
    public function store(Request $request)
    {
        Skill::create([
            'skill_name'   => $request->skill_name,
            'status'       => $request->status,
        ]);
       return redirect('skills')->with('message', 'Skills Added successfully!');
    }
    public function edit($id)
    {
        $title      = 'Edit Skills';
        $action_url = 'skills/update/'.$id;
        $Skill      = Skill::find($id);
        return view('skills.add_skills', [
            'skill'      =>  $Skill,
            'title'      =>  $title,
            'action_url' =>  $action_url,
         ]);
    }
    public function update(Request $request,$id)
    {
        $skill                = Skill::find($id);
        $skill->skill_name    = $request->skill_name;
        $skill->status        = $request->status;
        $skill->save();
        return redirect('skills')->with('message', 'Skills updated successfully!');
    }
    public function change_status(Request $request){
         $id         = $request->input('id');
        $status     = $request->input('status');
        $status     = $status == 1 ? 0 : 1;
        $is_updated   = Skill::find($id)->update(array('status' => $status));
        if($is_updated){
            return response()->json($is_updated);
        }else{
            return response()->json($is_updated);
        }
    }
    public function destroy($id)
    {
        $User  = Skill::findOrFail($id);
        $data  = $User->delete();
        return response()->json($data);
    }
    public function check_skill_name(Request $request){
        $skill_name = $request->skill_name;
        $isExists   = Skill::where('skill_name',$skill_name)->first();
        if($isExists){
            return response()->json(array("exists"=> true));
        }
        else{
            return response()->json(array("exists" => false));
        }

    }
}

