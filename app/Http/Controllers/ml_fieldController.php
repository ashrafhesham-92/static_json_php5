<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Module;

use App\ml_field;
use App\ml_validation;

class ml_fieldController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function remove_validation($field_id, $validation_id)//removes a validation from a field
	{
		//
		return 'loooool';
		$field = ml_field::find($field_id);
		
		$validation = ml_validation::find($validation_id);

		$field->validations()->newPivotStatement()->where($field->name, $validation->name)->delete();

		// $field->validations()->save($validation);

		return back();
	}

	public function add_validation($id, Request $request)//removes a validation from a field
	{
		
		$field = ml_field::find($id);
		$validation = ml_validation::find($request->validation);

		$field->validations()->save($validation);

		return back();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function destroy($id, Request $request)
	{
		//

		
		$field = ml_field::find($id);
		$ml_id = $field->module_id;
		$field->delete();

		return redirect('modules/edit/'.$ml_id)->with('success','field has been removed');
	}

}
