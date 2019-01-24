<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Page;


class PagesAddController extends Controller
{
    //
    public function execute(Request $request){

    	if($request->isMethod('post')){
    		// hanum enq sax baci tokenic
    		$input = $request->except('_token');

    		/*mer dzerov enk sarqum validacian*/
    		$validator = Validator::make($input,[
    			'name' => 'required|max:255',
    			'alias' => 'required|unique:pages|max:255',
    			'text'=> 'required'

    		]);

    		if ($validator->fails()) {
    			/*->withInput();  grum enk vor old(name) er@ mnan */
    			return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
    		}

    		if ($request->hasFile('images')) {

    			$file = $request->file('images');

	    		/*
	    		poxum enq faili iskakan anun@ 
				Symfony\Component\HttpFoundation\File\UploadedFile ic; 
	    		*/
	    		$input['images'] = $file->getClientOriginalName();

	    		/*cuyc enk talis te server kceluc heto et nkar@ ur gna
				public_path amena glxavor papken
	    		*/
	    		$file->move(public_path().'/assets/img',$input['images']);
	    		
	
    		 }
    		 /*hima petqa lcnenk Page@ ete sax chishta ancnum

    		 	kam senc
				  $page = new Page($input);

				kamel senc 

				u ampayman Page modeli mej $fillable i mej petqa 
				grenk te injnenq tuyl talis lracnel 


    		 */
    		 $page = new Page();


    		 $page->fill($input);


    		 if ($page->save()) {
    			return redirect('admin')->with('status','Страница добавлена');
    			
    		 }
    		

    	 }

    	if (view()->exists('admin.pages_add')) {
    		
    		$data = [
    				'title'=>'Новая страница'
    				];

    		return view('admin.pages_add',$data);
 
    	 }
    	abort(404);

     }
 }
