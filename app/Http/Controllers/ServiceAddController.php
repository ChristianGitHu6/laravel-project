<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service;
class ServiceAddController extends Controller
{
    //
    public function execute(Request $request){




    	// POST
    	if($request->isMethod('post')){

    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    			'name' => 'required|max:255',
    			'text'=> 'required',
    			'icon'=>'required'

    		]);
    		if ($validator->fails()) {
    			return redirect()->route('serviceAdd')->withErrors($validator)->withInput();
    		}
    		if ($request->hasFile('icon')) {
    			$file = $request->file('icon');
    			$input['icon'] = $file->getClientOriginalName();

    			$file->move(public_path().'/assets/img',$input['icon']);

    		}

    		$service = new Service();


    		 $service->fill($input);


    		 if ($service->save()) {
    			return redirect('admin')->with('status','Сервис добавлен');
    			
    		 }
    		
    	}


    	if (view()->exists('admin.services_add')) {

    		 $data = [
    				'title'=>'Новый Сервис'
    				];

    		return view('admin.services_add',$data);
    	}
   
    	abort(404);



    }
}
