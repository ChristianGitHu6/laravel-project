<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

class ServiceController extends Controller
{
    //
    public function execute(){


    $services = Service::all();

    $data = [
		'title'=>'Сервисы',
    	'services'=>$services
    ];

    return view('admin.services',$data);

    } 
}
    