<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests;
use App\model\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse ; // for data table

class Setting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //This Method is to view/display Logo
    public function logo(){
        $data = Settings::all();
         return view('settings.logo',['title'=>'Update Logo','data'=>$data,'action_url'=>'settings/update/1']);
    }
    public function update( Request $request){

        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = 'logo'.'.'.$file->getClientOriginalExtension();
            $image['filePath'] = $name;
            $file->move('assets/images/logo', $name);
        }else{
            $name =" ";
        }
        $updated   = Settings::find(1)->update(array('logo'=>$name));
        if($updated){
            return  redirect('settings/logo')->with('message', 'Data Updated Successfully!');
        }else{
            return  redirect('settings/logo')->with('message', 'Something happened Wrong Please Try again!');
        }
    }
}
