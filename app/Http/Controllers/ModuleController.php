<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Module;

use App\ml_field;
use App\ml_validation;

class ModuleController extends Controller {

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
	public function create($id)
	{
		$app = \App\application::find($id);
		//$ml_field_validation = ml_field_validation::all();
		//return view('modules.create', compact('ml_field_validation'));
		return view('modules.create', compact('app'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $id)
	{
		//


	   $app = \App\application::find($id);
		
	   $module_name = $request->name;
	   
       $module = new Module;
       
       $module->name = $module_name;
       $module->save();
 	   $app->modules()->save($module);

       return back()->with('success', 'module has been created');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$app = \App\application::find($id);
		$app_id = $app->id;
		$modules = $app->modules;	
		
		// $modules = \App\Module::find($id);
		return view('modules.view', compact('modules'), compact('app'));
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
		$module = Module::find( $id);
		$fields = $module->fields;
		$field_validations = ml_validation::all();

        return view('modules.edit')->with(compact('field_validations'))->with(compact('module'))->with( compact('fields'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

		$module = Module::find($id);

		

		$module->name = $request->module_name;		
		$module->save();

		if($request->field != NULL){
			$field = new ml_field;
			$field->name = $request->field;

			$module->fields()->save($field);

			// return $validation;
			if($request->validation != NULL){
				$validation = ml_validation::find($request->validation);
				$field->validations()->save($validation);
			}

		}


		return redirect('modules/edit/'.$id)->with('id')->with('success','Module has been updated');
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
		$module = Module::find($id);
		$module->delete();

		return back()->with('success','Module has been removed');
	}

}
