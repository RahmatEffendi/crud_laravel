<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;

class CrudController extends Controller
{
	function index(){
		$data = Profiles::all();

		return view('welcome', compact('data'));
	}

	function create(){
		return view('create');
	}

    function saved(Request $request) {
    	$first = $request->firstname;
    	$last = $request->lastname;
    	$email = $request->email;
    	$address = $request->address;

    	//save
    	$data = new Profiles;
    	$data->firstname = $first;
    	$data->lastname = $last;
    	$data->email = $email;
    	$data->address = $address;
    	$data->save();

    	if ($data) {
    		return redirect('/');
    	}
    }

    function edit($id){
    	$data = Profiles::find($id);
    	return view('edit', compact('data'));
    }

    function update(Request $request){
    	$id = $request->id;
    	$first = $request->firstname;
    	$last = $request->lastname;
    	$email = $request->email;
    	$address = $request->address;
    	//save
    	$data = Profiles::find($id);
    	$data->firstname = $first;
    	$data->lastname = $last;
    	$data->email = $email;
    	$data->address = $address;
    	$data->save();

    	if ($data) {
    		return redirect('/');
    	}
    }

    function delete($id){
    	$data = Profiles::destroy($id);
        if ($data) {
       		return redirect('/');
        }
    }
}
