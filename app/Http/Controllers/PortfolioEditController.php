<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

use Validator;
class PortfolioEditController extends Controller
{
    //
    public function execute(Request $request,$id){


        	if ($request->isMethod('post')) {
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    			'name' => 'required|max:255|unique:portfolios,name,'.$id,
    			'filter' => 'required|max:255'
    		]);	

    		if ($validator->fails()) {
    			return redirect()->route('portfolioEdit',$id)->withErrors($validator)->withInput();
    		}

    		if ($request->hasFile('images')) {
    			$file = $request->file('images');
    			$input['images'] = $file->getClientOriginalName();
    			$file->move(public_path().'assets/img/',$input['images']);
    		}
    		else{
    			$input['images'] = $input['old_images'];
    		}
    		unset($input['old_images']);

    		$portfolio = Portfolio::find($id)->fill($input);

			if ($portfolio->update()) {
				return redirect('admin')->with('status','Portfolio обновлена');
			}

    	}




    	if (view()->exists('admin.portfolios_edit')) {
    		$portfolio = Portfolio::find($id);

    		$data = [
    			'title' => 'Редактирование Портфолия',
    			'portfolio' => $portfolio
    		];

    		return view('admin.portfolios_edit',$data);



    	}
    	

	}
}
