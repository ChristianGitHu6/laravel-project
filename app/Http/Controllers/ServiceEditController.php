<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use Validator;

class ServiceEditController extends Controller
{
    //
    public function execute(Request $request,$id){

        if($request->isMethod('delete')){
             Service::find($id)->delete();
             return redirect('admin')->with('status','Сервис удален');
        }





    	if ($request->isMethod('post')) {
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    			'name' => 'required|max:255|unique:services,name,'.$id,
				'text' => 'required'
    		]);
    		if ($validator->fails()) {
    			return redirect()->route('serviceEdit',$id)->withErrors($validator)->withInput();
    		}
    		if ($request->hasFile('icon')) {
    			$file = $input->file('icon');
    			$input['icon'] = $file->getClientOriginalName();
    			$file->move(public_path().'/assets/img',$input['icon']);
    		}
    		else{
    			$input['icon'] = $input['old_icon'];
    		}
    		unset($input['old_icon']);

    		$service = Service::find($id)->fill($input);

			if ($service->update()) {
				return redirect('admin')->with('status','Сервис обновлена');
			}



    	}





    
    	if (view()->exists('admin.services_edit')) {
    	   $service = Service::find($id);
            $data = [
                'title'=>'Редактирование Сервиса',
                'service'=>$service
            ];

    		return view('admin.services_edit',$data);
    	}

    }
}
