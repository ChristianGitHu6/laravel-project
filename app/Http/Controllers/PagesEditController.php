<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use Validator;

class PagesEditController extends Controller
{
    //
    public function execute($id,Request $request){


    	// DELETE

    	if ($request->isMethod('delete')) {
    		 Page::find($id)->delete();
    		 return redirect('admin')->with('status','Страница удалена');
    	}














    	// POST
		if ($request->isMethod('post')) {
			
			$input = $request->except('_token');

			/*'alias' => 'required|max:255|unique:pages,alias,'.$id,
				mez petqa vor unikal lini 
				bayc ete chuzenank poxenk ink@ chi ashxati
			*/
			$validator = Validator::make($input,
				[
					'name' => 'required|max:255',
					'alias' => 'required|max:255|unique:pages,alias,'.$id,
					'text' => 'required'
				]);

			if ($validator->fails()) {
				return redirect()->route('pagesEdit',$id)->withErrors($validator)->withInput();
			}

			if ($request->hasFile('images')) {
				$file = $request->file('images');

				$file->move(public_path().'/assets/img',$file->getClientOriginalName());
				$input['images'] = $file->getClientOriginalName();
			}
			else{
				$input['images'] = $input['old_images'];
			}
			unset( $input['old_images']);

			$page = Page::find($id)->fill($input);

			if ($page->update()) {
				return redirect('admin')->with('status','Страница обновлена');
			}

		}
    	








		// GET
    	$old = Page::find($id);

    	if (view()->exists('admin.pages_edit')) {
    		$data = [
    			'title'=>'Редактирование страницы - '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.pages_edit',$data);
    	}


    }
}
