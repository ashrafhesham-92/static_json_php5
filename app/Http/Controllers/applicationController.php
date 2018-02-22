<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class applicationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('applications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//


		
	   $app_name = $request->name;
	   
       $app = new \App\application;
       
       $app->name = $app_name;
       $app->save();
 	   
       return back()->with('success', 'module has been created');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		//
		$apps = \App\application::all();
		return view('applications.view', compact('apps'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$app = \App\Application::find( $id);
		
        return view('applications.edit')->with(compact('app'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

		$app = \App\application::find($id);

	

		$app->name = $request->name;		
		$app->save();

	

		return redirect('apps/edit/'.$id)->with('id')->with('success','App has been updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$app = \App\application::find($id);
		$app->delete();

		return redirect('apps/view')->with('success','App has been removed');
	}

}
