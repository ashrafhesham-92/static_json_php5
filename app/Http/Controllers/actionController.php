<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class actionController extends Controller {

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
		return view('lists.createaction');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

		$action = new \App\action;

		$action->name = $request->name;
		$action->title = $request->title;
		$action->target_action_id = $request->target_action_id;
		$action->target_type = $request->target_type;
		$action->target_content = $request->target_content;
		$action->content_id = $request->content_id;
		
		$action->target_lay_out_id = $request->target_lay_out_id;
		$action->target_url = $request->url;
		$action->icon_id = $request->icon_id;

		$action->save();

		return back()->with('success', 'action has been created');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$actions = \App\action::all();
		return view('lists.actions', compact('actions'));
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
		$action = \App\action::find($id);

		//to remove excessive cells in order to prevent cells table from having unused data in the future
		
		$action->delete();

		return back()->with('success','action has been removed');
	}

}
